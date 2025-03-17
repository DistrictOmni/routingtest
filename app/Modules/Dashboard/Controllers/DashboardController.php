<?php
namespace App\Modules\Dashboard\Controllers;

use App\Core\Auth\Controllers\MenuBuilderController; // Assuming MenuBuilderController exists
use App\Core\Auth\Services\AuthService;
use Exception;
use App\Core\Middleware\AuthMiddleware; // To get the authenticated user

class DashboardController
{
    protected AuthService $authService;
    protected MenuBuilderController $menuBuilderController;

    // Inject both AuthService and MenuBuilderController via the constructor
    public function __construct(AuthService $authService, MenuBuilderController $menuBuilderController)
    {
        $this->authService = $authService;
        $this->menuBuilderController = $menuBuilderController;
    }

    public function dashboard()
    {
        // Get the authenticated user's ID via middleware or token
        try {
            $user = AuthMiddleware::handle(); // Assuming this returns the authenticated user
            $userId = $user->id; // Dynamically get user ID from the authenticated user

            // Fetch roles, modules, and permissions for the user
            $roles = $this->menuBuilderController->getUserRoles($userId);
            $modules = $this->menuBuilderController->getModulesForUserRoles($roles);
            $permissions = $this->menuBuilderController->getUserPermissions($userId, $modules);

            // Pass variables to the view
            return renderSecuredView(
                'Dashboard', // Module Name
                'DashboardView', // View Name
                'Dashboard', // Page Title
                [
                    'roles' => $roles,
                    'modules' => $modules,
                    'permissions' => $permissions,
                    // Any other necessary data
                ]
            );

        } catch (Exception $e) {
            // Handle the case when there's no valid user or error
            header("Location: /auth/login");
            exit;
        }
    }
}
