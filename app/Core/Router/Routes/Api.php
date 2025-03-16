<?php

namespace App\Core\Router\Routes;

use App\Core\Router\Router;
use App\Core\Auth\Controllers\AuthController;
use App\Core\Auth\Services\AuthService;
use App\Core\Database\Database;

return function (Router $router) {
    // Example: a POST route for registering via an API endpoint
    $router->post('/api/register', [new AuthController(new AuthService(new Database(
        'localhost',
        'dbname',
        'username',
        'password'
    ))), 'register']);

    // Example: a POST route for logging in via an API endpoint
    $router->post('/api/login', [new AuthController(new AuthService(new Database(
        'localhost',
        'dbname',
        'username',
        'password'
    ))), 'login']);
};
