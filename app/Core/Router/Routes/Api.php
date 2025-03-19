<?php

use App\Core\Router\Router;
use App\Modules\Auth\Controllers\AuthController;
use App\Core\Database\Database;
return function (Router $router) {
    /*************************************************
     * API AUTHENTICATION & AUTHORIZATION ROUTES
     *************************************************/

     $router->group('/api', function($router) {
        $router->post('/api/auth/login', function () {
            $authController = new AuthController();
            return $authController->processLogin();
        });
        
    
        $router->post('/auth/logout', [AuthController::class, 'logout']);
    });
    
 
   
};
