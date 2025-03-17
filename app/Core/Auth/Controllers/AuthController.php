<?php

namespace App\Core\Auth\Controllers;

use App\Core\Auth\Services\AuthService;
use Exception;

class AuthController
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function attemptLogin()
    {
        // 1) Read form data
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        // Basic validation
        if (!$email || !$password) {
            $this->respondWithError("Email and password are required.", 400);
            return;
        }

        try {
            $tokenData = $this->authService->attemptLoginWithCredentials(
                $email,
                $password,
                $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
                $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0'
            );

            // Decide JSON or HTML based on Accept header
            if ($this->wantsJson()) {
                // Return JSON to e.g. mobile or a JavaScript SPA
                header('Content-Type: application/json', true, 200);
                echo json_encode([
                    'token'      => $tokenData['token'],
                    'expires_at' => $tokenData['expires_at'],
                ]);
                exit;
            } else {
                // Set the cookie for classic web flow
                // We assume $tokenData['expires_at_timestamp'] is a numeric epoch timestamp
                setcookie(
                    'token',
                    $tokenData['token'],
                    $tokenData['expires_at_timestamp'],
                    '/',
                    '',
                    true,   // secure
                    true    // httpOnly
                );

                // Then redirect to dashboard
                header('Location: /dashboard', true, 302);
                exit;
            }

        } catch (Exception $e) {
            $this->respondWithError($e->getMessage(), 401);
        }
    }

    public function logout()
    {
        // For a JWT approach, you might also revoke it from the DB (sessions table).
        // If you set a cookie, you can clear it:
        setcookie('token', '', time() - 3600, '/');
        echo "Logged out!";
    }

    /**
     * Check if client wants JSON vs HTML
     */
    private function wantsJson(): bool
    {
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        if (stripos($accept, 'application/json') !== false) {
            return true;
        }
        // Could also check a custom header or query param if you prefer
        return false;
    }

    /**
     * Respond with an error message
     */
    private function respondWithError(string $message, int $statusCode = 400): void
    {
        if ($this->wantsJson()) {
            http_response_code($statusCode);
            header('Content-Type: application/json');
            echo json_encode(['error' => $message]);
            exit;
        } else {
            // For HTML fallback
            http_response_code($statusCode);
            echo "<p style='color:red;'>Error: {$message}</p>";
            // Or set a flash message, then redirect
            // setFlashMessage('error', $message);
            // header('Location: /auth/login');
            exit;
        }
    }
}
