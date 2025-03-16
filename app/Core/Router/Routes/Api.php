<?php

use App\Core\Router\Router;
use App\Core\Auth\Controllers\AuthController;
use App\Core\Auth\Services\AuthService;
use App\Core\Database\Database;

return function (Router $router) {
    $database = new Database();
    $authService = new AuthService($database);
    $authController = new AuthController($authService);

    $router->post('/api/register', [$authController, 'attemptLogin']);
    $router->post('/api/login', [$authController, 'attemptLogin']);
};
