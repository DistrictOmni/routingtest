<?php
namespace App\Core\Auth\Controllers;

use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use App\Models\UserRole;
use App\Models\UserPermission;

class MenuBuilderController
{
    public function buildMenu($userId)
    {
        // Step 1: Get user roles from session
        $roles = $_SESSION['user_roles'] ?? [];

        // Step 2: Get modules that the user has access to based on roles
        $modules = $_SESSION['user_modules'] ?? [];

        // Step 3: Get permissions for the user on those modules
        $permissions = $_SESSION['user_permissions'] ?? [];

        // Step 4: Generate and render the menu based on session data
        return $this->renderView($modules, $permissions);
    }
    public function getUserRoles($userId)
    {
        return DB::table('user_roles')
            ->join('auth_roles', 'user_roles.role_id', '=', 'auth_roles.id')
            ->where('user_roles.user_id', $userId)
            ->pluck('auth_roles.name');
    }

    public function getModulesForUserRoles($roles)
    {
        $roleIds = $roles->pluck('id')->toArray();

        return DB::table('role_module_access')
            ->join('core_modules', 'role_module_access.module_id', '=', 'core_modules.id')
            ->whereIn('role_module_access.role_id', $roleIds)
            ->where('role_module_access.has_access', true)
            ->pluck('core_modules.name');
    }

    public function getUserPermissions($userId, $modules)
    {
        $moduleIds = $modules->pluck('id')->toArray();

        return DB::table('user_permissions')
            ->join('permissions', 'user_permissions.permission_id', '=', 'permissions.id')
            ->whereIn('permissions.module_id', $moduleIds)
            ->where('user_permissions.user_id', $userId)
            ->pluck('permissions.name', 'permissions.module_id');
    }
    private function renderView($modules, $permissions)
    {
        // Organize permissions by module
        $menuData = [];
        foreach ($modules as $module) {
            $menuData[$module] = [
                'name' => $module,
                'permissions' => $permissions[$module] ?? []
            ];
        }

        // Pass the data to the view (assuming you're using PHP with views)
        return view('menu-builder', ['menuData' => $menuData]);
    }
}
