<?php
namespace App\Modules\Dashboard\Controllers;

use App\Modules\Auth\Models\User;
use Exception;

class DashboardController
{

    // Inject both AuthService and MenuBuilderController via the constructor
    public function __construct()
    {

    }
    public function showDashboard()
    {
        // Check if the user is already logged in via session
        if (isset($_SESSION['user_id'])) {
            // or if you have user_id in the session
// Instead of just with('roles.permissions'), do:
$user = User::with(['roles.modules', 'roles.permissions.module'])
    ->find($_SESSION['user_id']);

            // If you also store roles in session (optional):
            // e.g. $_SESSION['user_roles'] = [ 'admin', 'editor' ] or something
            $sessionRoles = $_SESSION['user_roles'] ?? [];

            // Prepare the data for the view
            $data = [
                'user'         => $user,
                'roles'        => $user ? $user->roles : [],
                'sessionRoles' => $sessionRoles,
                'cookies'      => $_COOKIE,
                'sessionData'  => $_SESSION,
            ];

            // In showDashboard(), after we have $user:
$accessibleModules = collect();

if ($user) {
    foreach ($user->roles as $role) {
        // Each role has a collection of modules
        foreach ($role->modules as $mod) {
            // pivot->allowed means the role grants access
            if ($mod->pivot->allowed) {
                $accessibleModules->push($mod);
            }
        }
    }

    // Remove duplicates by ID, in case multiple roles grant the same module
    $accessibleModules = $accessibleModules->unique('id')->values();
}

// Then pass $accessibleModules to the view
$data = [
    'user'             => $user,
    'roles'            => $user ? $user->roles : [],
    'sessionRoles'     => $sessionRoles,
    'cookies'          => $_COOKIE,
    'sessionData'      => $_SESSION,
    'accessibleModules' => $accessibleModules,
];

return $this->renderView('DashboardView', 'GlobalLayout', 'Dashboard', $data);


            // Render the view with the data
            return $this->renderView('DashboardView', 'GlobalLayout', 'Dashboard', $data);
        }

        // If not logged in, redirect to login or show login view
        $data = [
            'title'   => 'Login',
            'message' => 'Please login to your account',
        ];
        return $this->renderView('Login', 'AuthLayout', 'Login', $data);
    }

    
 // Method to render views with a dynamic layout and data
 protected function renderView(string $view, string $layout, string $title, array $data = [])
{
    // Extract data for easier access in the view
    extract($data);

    // Get the content of the specific view
    ob_start();
    include __DIR__ . '/../Views/' . $view . '.php';  // This assumes the path to the views is correct
    $content = ob_get_clean();

    // Inject the content into the layout
    $data['content'] = $content;  // Make sure 'content' is available in the layout

    // Include the layout, passing the $data array (which contains 'title', 'message', etc.)
    include __DIR__ . '/../../../Shared/Layouts/' . $layout . '.php';
}

}
