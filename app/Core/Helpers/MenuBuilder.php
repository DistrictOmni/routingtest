<?php
namespace App\Core\Helpers;

use App\Core\Auth\Models\User;
use App\Core\Auth\Models\Role;
use App\Core\Auth\Models\Module;
use App\Core\Router\Router;

class MenuBuilder
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Build the global aside menu based on the user roles.
     *
     * @param User $user
     * @return array
     */
    public function buildMenu(User $user)
    {
        // Get the user's roles
        $roles = $user->roles()->get();
        
        $menuItems = [];
        
        foreach ($roles as $role) {
            // Get modules for this role (assuming roles are related to modules via many-to-many)
            $modules = $role->modules()->get();

            foreach ($modules as $module) {
                // Check if the role has permissions for this module
                $permissions = $role->permissions()->where('module_id', $module->id)->get();
                
                // Assuming permission check is "view" for simplicity
                if ($permissions->contains('name', 'view')) {
                    // Add the module to the menu if the user has the "view" permission
                    $menuItems[] = [
                        'name' => $module->name,
                        'url'  => $this->router->getUrl($module->slug),  // Use the Router to resolve URL
                    ];
                }
            }
        }

        return $menuItems;
    }
}
