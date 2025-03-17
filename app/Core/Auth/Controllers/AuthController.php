<?php

namespace App\Core\Auth\Controllers;

use App\Core\Auth\Services\AuthService;
use Exception;
/**
 * Auth Controller
 * /app/Core/Auth/Controllers/AuthController.php
 * 
 * This controller handles user authentication for both web and mobile clients.
 * 
 * attemptLogin() - Attempts to log the user in with the provided credentials.
 * logout() - Logs the user out.
 */
class AuthController
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function attemptLogin()
    {
        // Read form data from $_POST
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        // Basic validation
        if (!$email || !$password) {
            // Show an error or redirect back to /auth/login
            http_response_code(400);
            echo "Email and password are required.";
            exit;
        }

        try {
            // attemptLogin() from the AuthService now expects:
            // attemptLogin(string $email, string $password, string $userAgent, string $ipAddress): array
            $tokenData = $this->authService->attemptLogin(
                $email,
                $password,
                $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
                $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0'
            );

            /**
             * At this point, you have a JWT (`$tokenData['token']`) 
             * and an expiration time (`$tokenData['expires_at']`).
             * 
             * For a classic server-rendered app, you might store
             * the JWT in a secure HTTP-only cookie:
             */
            setcookie(
                'token',                  // Cookie name
                $tokenData['token'],      // JWT
                $tokenData['expires_at'], // Expiration timestamp
                '/',                      // Path
                '',                       // Domain (if needed)
                true,                     // Secure? (true in production with HTTPS)
                true                      // HttpOnly
            );

            // Then redirect to a secured route
            header('Location: /dashboard');
            exit;
        } catch (Exception $e) {
            http_response_code(401);
            echo "Login error: " . $e->getMessage();
        }
    }

    public function logout()
    {
        // For a JWT approach, you might revoke it from the DB (sessions table).
        // If you set a cookie, you can clear it:
        setcookie('token', '', time() - 3600, '/');
        echo "Logged out!";
    }
}
