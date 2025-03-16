<?php

namespace App\Core\Auth\Controllers;

use App\Core\Auth\Services\AuthService;
use App\Core\Auth\Models\User;

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


    /**
     * Attempt to log the user in with the provided credentials
     */
    public function attemptLogin(array $credentials): ?User
    {
        // Example: pass credentials to the service and return a User object on success
        return $this->authService->loginUser($credentials);
    }

    /**
     * Handle user logout
     */
    public function logout(): void
    {
        // Example: Clear session or authentication tokens here
        $this->authService->logoutUser();
    }
}
