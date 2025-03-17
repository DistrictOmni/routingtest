<?php

use App\Core\Router\Router;
use App\Core\Middleware\AuthMiddleware;
use App\Core\Auth\Controllers\AuthController;
use App\Core\Auth\Services\AuthService;
use App\Core\Database\Database;

use App\Core\Auth\Models\Role;

use App\Core\Auth\Models\User;

/**
 * Web Route Definitions
 * /app/Core/Router/Routes/Web.php
 */


// Helpers for rendering views
require_once __DIR__ . '/../../Helpers/AuthView.php';
require_once __DIR__ . '/../../Helpers/SecuredView.php';
require_once __DIR__ . '/../../Helpers/SecuredCoreView.php';

return function (Router $router) {

    $router->get('/', function () {
        // If the user is logged in, go to dashboard. Otherwise, go to login.
        if (!empty($_COOKIE['token'])) {
            try {
                // Attempt to validate the token. 
                // If valid, AuthMiddleware::handle() returns the User; 
                // if invalid, it redirects to /auth/login
                $user = AuthMiddleware::handle();
                // If we reach here, the token was valid
                header("Location: /dashboard");
                exit;
            } catch (\Exception $e) {
                // If there's an error decoding or verifying
                header("Location: /auth/login");
                exit;
            }
        } else {
            // If no cookie at all, definitely not logged in
            header("Location: /auth/login");
            exit;
        }
    });

    // Render login page
    $router->get('/auth/login', function () {
        renderAuthView('LoginView', 'Login Page');
    });

    // Logout route (Could call a controller method or simply show a view)
    $router->get('/auth/logout', function () {
        // Show a "Logged out" page or redirect to login
        renderAuthView('LoginView', 'Logout');
    });






    $router->get('/dashboard', function () {
        // Ensure session is started.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Get the authenticated user via your middleware.
        $user = \App\Core\Middleware\AuthMiddleware::handle();
    
        // Gather debugging data.
        $cookies = $_COOKIE;
        $sessionData = $_SESSION;
        
        // Retrieve the JWT token from the cookie.
        $token = $_COOKIE['token'] ?? null;
        $dbSession = null;
        if ($token) {
            try {
                // Decode the token to get the jti.
                $decoded = \Firebase\JWT\JWT::decode($token, new \Firebase\JWT\Key('your_secret_key', 'HS256'));
                $jti = $decoded->jti;
                // Look up the session record using Eloquent.
                $dbSession = \App\Core\Auth\Models\Session::where('jti', $jti)->first();
            } catch (\Exception $e) {
                $dbSession = "Invalid token: " . $e->getMessage();
            }
        }
    
        // Package all data into an array.
        $data = [
             'user'         => $user ? $user->toArray() : null,
             'cookies'      => $cookies,
             'sessionData'  => $sessionData,
             'dbSession'    => $dbSession ? (is_object($dbSession) ? $dbSession->toArray() : $dbSession) : null,
        ];
    
        // Pass the data array to your secured view.
        renderSecuredView('Dashboard', 'DashboardView', 'Dashboard', $data);
    });
    
    

    // Handle the login POST request
    $router->post('/auth/login', function () {
        // Normally you'd have dependency injection, 
        // but for illustration we can instantiate here:
        $authController = new AuthController(
            new AuthService(new Database())
        );

        $authController->attemptLogin(); // Handle the form submission
    });



/**
 * Admin Routes
 */
 $router->get('/admin/auth/users', function () {
    // Possibly check user permissions, etc...

    // 1) Retrieve pagination parameters (page, per_page) from querystring
    $page    = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 25;

    // 2) Use Eloquent to fetch paginated users
    // This returns an instance of Illuminate\Pagination\LengthAwarePaginator
    $users = User::paginate($perPage, ['*'], 'page', $page);

    // 3) Additional relationships or queries if needed:
    // e.g. ->with('roles')

    // 4) Pass $users into the view
    $data = [
        'users'       => $users,
        'currentPage' => $users->currentPage(),
        'totalPages'  => $users->lastPage(),
        // etc. if you want them explicitly
    ];

    // 5) Render with your "secured" layout in the Core "AllUsersView.php"
    renderSecuredCoreView('AllUsersView', 'User Management', $data);
});
$router->get('/admin/auth/roles', function () {
    // Possibly check user permissions, etc...

    // 1) Retrieve pagination parameters (page, per_page) from query string
    $page    = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 25;

    // 2) Use Eloquent to fetch paginated roles
    // This returns an instance of Illuminate\Pagination\LengthAwarePaginator
    $roles = Role::paginate($perPage, ['*'], 'page', $page);

    // 3) Additional relationships if needed:
    // e.g. $roles->load('permissions');

    // 4) Pass $roles into the view
    $data = [
        'roles'       => $roles,
        'currentPage' => $roles->currentPage(),
        'totalPages'  => $roles->lastPage(),
        // etc., if you want them explicitly
    ];

    // 5) Render with your "secured" layout, pointing to "AllRolesView.php"
    renderSecuredCoreView('AllRolesView', 'Role Management', $data);
});



};
