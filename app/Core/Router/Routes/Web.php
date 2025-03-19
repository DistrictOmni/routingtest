<?php

use App\Core\Router\Router;
use App\Modules\Auth\Controllers\AuthController;
use App\Core\Database\Database;
use App\Modules\Dashboard\Controllers\DashboardController;

/**
 * Web Route Definitions
 * /app/Core/Router/Routes/Web.php
 */


return function (Router $router) {
    $database = new Database(); // Create the Database instance


     /*************************************************
     * APP ENTRY ROUTES
     *************************************************/

    $router->get('/', function () {
        // Ensure session is started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Check if user is logged in by checking session
        if (isset($_SESSION['user_id'])) {
            // If logged in, redirect to the dashboard
            header("Location: /dashboard");
            exit;
        } else {
            // If no session (not logged in), store the intended URL and redirect to login
            $_SESSION['intended_url'] = '/';  // Store the current page as intended URL
            header("Location: /auth/login");
            exit;
        }
    });
    


    /*************************************************
     * AUTHENTICATION & AUTHORIZATION ROUTES
     *************************************************/
    
    // Handle the login GET request
    $router->get('/auth/login', function () {
        // Create an instance of AuthController
        $authController = new AuthController();
        
        // Show the login form
        return $authController->showLoginForm();
    });

    // Handle the login POST request
    $router->post('/auth/login', function () {
        // Create an instance of AuthController
        $authController = new AuthController();
        
        // Process the login
        return $authController->processLogin();
    });

    $router->post('/auth/logout', [AuthController::class, 'logout']);

    $router->get('/auth/logout', [AuthController::class, 'logout']);



    


    /*************************************************
     * Post Login ROUTES
     *************************************************/
    
    // Handle the login GET request
    $router->get('/dashboard', function () {
        
        $dashboardController = new DashboardController();
        
        // Show the login form
        return $dashboardController->showDashboard();
    });
    



};