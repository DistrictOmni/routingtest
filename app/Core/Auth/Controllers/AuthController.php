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
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
    
        // Basic validation
        if (!$email || !$password) {
            // For a web-only flow, you might set a flash message and redirect:
            setFlashMessage('error', 'Email and password are required.');
            header('Location: /auth/login');
            exit;
        }
    
        try {
            $tokenData = $this->authService->attemptLoginWithCredentials(
                $email,
                $password,
                $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
                $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0'
            );
    
            // Web flow: set a cookie
            setcookie(
                'token',
                $tokenData['token'],
                $tokenData['expires_at_timestamp'], // Make sure your service returns numeric timestamp
                '/',
                '',
                true,   // secure
                true    // httpOnly
            );
    
            // Then redirect to dashboard
// If we saved an intended URL, use it. Otherwise default to /dashboard
session_start();
if (!empty($_SESSION['intended_url'])) {
    $destination = $_SESSION['intended_url'];
    unset($_SESSION['intended_url']); // clear it so it doesn't persist
    header("Location: $destination");
    exit;
}

// No intended URL? Go to dashboard
header('Location: /dashboard');
            exit;
    
        } catch (Exception $e) {
            // On error, set a flash message and redirect:
            setFlashMessage('error', $e->getMessage());
            header('Location: /auth/login');
            exit;
        }
    }
    

    public function logout()
    {
        // For a JWT approach, you might also revoke it from the DB (sessions table).
        // If you set a cookie, you can clear it:
        setcookie('token', '', time() - 3600, '/');
        echo "Logged out!";
    }


}
