<?php

namespace App\Core\Auth\Controllers;

use App\Core\Auth\Services\AuthService;
use Exception;
use App\Core\Database\Database; // Import the custom Database class

class AuthController
{
    protected AuthService $authService;
    protected Database $db;

    public function __construct(AuthService $authService, Database $db)
    {
        $this->authService = $authService;
        $this->db = $db; // Assign the Database instance
    }

  // Inside AuthController

public function attemptLogin()
{
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    // Basic validation
    if (!$email || !$password) {
        setFlashMessage('error', 'Email and password are required.');
        header('Location: /auth/login');
        exit;
    }

    try {
        // Authenticate and get token data
        $tokenData = $this->authService->attemptLoginWithCredentials(
            $email,
            $password,
            $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
            $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0'
        );

        // Set the token as a cookie
        setcookie(
            'token',
            $tokenData['token'],
            $tokenData['expires_at_timestamp'],
            '/',
            '',
            true,   // secure
            true    // httpOnly
        );

        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $userId = $tokenData['user_id']; // Dynamically set based on authenticated user
        // Get the user roles associated with the authenticated user
        $roles = $this->getUserRoles($userId);

        // Store roles in session
        $_SESSION['user_roles'] = $roles;
        echo '<pre>';
print_r($_SESSION);
echo '</pre>';

        // Redirect to intended URL or dashboard
        if (!empty($_SESSION['intended_url'])) {
            $destination = $_SESSION['intended_url'];
            unset($_SESSION['intended_url']);
            header("Location: $destination");
            exit;
        }

        exit;

    } catch (Exception $e) {
        setFlashMessage('error', $e->getMessage());
        header('Location: /auth/login');
        exit;
    }
}

// Method to get user roles from the database
private function getUserRoles($userId)
{
    return $this->db->getCapsule()->table('auth_user_roles')
        ->join('auth_roles', 'auth_user_roles.role_id', '=', 'auth_roles.id')
        ->where('auth_user_roles.user_id', $userId)
        ->pluck('auth_roles.name'); // Retrieve role names only
}


    private function getModulesForUserRoles($roles)
    {
        $roleIds = $roles->pluck('id')->toArray();

        // Again, use $this->db->getCapsule()->table() for querying the database
        return $this->db->getCapsule()->table('auth_role_module_access')
            ->join('core_modules', 'auth_role_module_access.module_id', '=', 'core_modules.id')
            ->whereIn('auth_role_module_access.role_id', $roleIds)
            ->where('auth_role_module_access.has_access', true)
            ->pluck('core_modules.name');
    }

    private function getUserPermissions($userId, $modules)
    {
        $moduleIds = $modules->pluck('id')->toArray();

        return $this->db->getCapsule()->table('auth_user_permissions')
            ->join('auth_permissions', 'auth_user_permissions.permission_id', '=', 'auth_permissions.id')
            ->whereIn('auth_permissions.module_id', $moduleIds)
            ->where('auth_user_permissions.user_id', $userId)
            ->pluck('auth_permissions.name', 'auth_permissions.module_id');
    }

    public function logout()
    {
        setcookie('token', '', time() - 3600, '/');
        echo "Logged out!";
    }
}
