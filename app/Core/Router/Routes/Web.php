<?php

use App\Core\Router\Router;

return function (Router $router) {
    $router->get('/', function () {
        echo "Welcome to the Home Page!";
    });

    $router->get('/about', function () {
        echo "This is the About Page!";
    });

    $router->get('/auth/login', function () {

        echo "This is the Login Page!";
    });
};
