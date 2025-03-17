<?php

use App\Core\Router\Router;
use App\Core\Auth\Controllers\AuthController;
use App\Core\Auth\Services\AuthService;
use App\Core\Database\Database;

return function (Router $router) {
    $database = new Database(); // Create the Database instance
    $authService = new AuthService($database); // Pass the Database instance to AuthService
    $authController = new AuthController($authService, $database); // Pass both AuthService and Database to AuthController

    $router->post('/api/register', [$authController, 'attemptLogin']);
    $router->post('/api/login', [$authController, 'attemptLogin']);
};
