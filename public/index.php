<?php
// index.php (or similar)

// 1. Autoload (if using Composer)
require_once __DIR__ . '/../vendor/autoload.php';

// 2. Initialize your router
use App\Core\Router\Router;

$router = new Router();

// 3. Load routes
$webRoutes = require_once __DIR__ . '/../app/Core/Router/Routes/Web.php';
$apiRoutes = require_once __DIR__ . '/../app/Core/Router/Routes/Api.php';

// Register them (pass $router into the closures)
$webRoutes($router);
$apiRoutes($router);

// 4. Dispatch
$method = $_SERVER['REQUEST_METHOD'];
$uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($method, $uri);
