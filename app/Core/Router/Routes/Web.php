<?php

use App\Core\Router\Router;

// Make sure to require your auth_view helper
require_once __DIR__ . '/../../Helpers/AuthView.php';
require_once __DIR__ . '/../../Helpers/SecuredView.php';

return function (Router $router) {
    $router->get('/', function () {
        echo "Welcome to the Home Page!";
    });

    $router->get('/about', function () {
        echo "This is the About Page!";
    });

    $router->get('/auth/login', function () {
        // This uses the dedicated Auth helper to load "Login.php" with "AuthLayout.php"
        renderAuthView('LoginView');
    });

    $router->get('/dashboard', function () {
        // This uses the secured layout
        renderSecuredView('Dashboard');
    });
};
