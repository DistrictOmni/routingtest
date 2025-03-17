<?php

use App\Core\Router\Router;
use App\Core\Middleware\AuthMiddleware;
use App\Core\Auth\Controllers\AuthController;
use App\Core\Auth\Services\AuthService;
use App\Core\Database\Database;
/**
 * Web Route Definitions
 * /app/Core/Router/Routes/Web.php
 */

// Helpers for rendering views
require_once __DIR__ . '/../../Helpers/AuthView.php';
require_once __DIR__ . '/../../Helpers/SecuredView.php';

return function (Router $router) {

    // Home route
    $router->get('/', function () {
        // Optionally check if user is logged in:
        // If so, redirect to dashboard
        // If not, redirect to /auth/login
        echo "Welcome to the Home Page!";
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

    // Secured route for dashboard
    // If using middleware, you'd check token here.
    $router->get('/dashboard', function () {
        //Enforce Middleware
    $user = AuthMiddleware::handle();
        // Example call: This will render "DashboardView.php" with "Dashboard" as the title
        renderSecuredView('DashboardView', 'Dashboard', 'Dashboard');
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
};
