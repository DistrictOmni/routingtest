<?php
// index.php (or similar)
session_start(); // Start the session BEFORE loading routes or sending output. Not used for auth at all. We use JWT. Used for Toast etc

// 1. Autoload (if using Composer)
require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\Pagination\Paginator;
// Set the current page from the query string, defaulting to 1 if not provided.
Paginator::currentPageResolver(function () {
    return isset($_GET['page']) ? (int) $_GET['page'] : 1;
});
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


/**
 * Set a flash message in $_SESSION.
 *
 * @param string $type    e.g. 'success', 'error', 'info', etc.
 * @param string $message The message text
 */
function setFlashMessage(string $type, string $message): void
{
    // Ensure 'flash' is an array we can push messages into
    if (!isset($_SESSION['flash'])) {
        $_SESSION['flash'] = [];
    }

    $_SESSION['flash'][] = [
        'type' => $type,
        'message' => $message,
    ];
}

/**
 * Retrieve and clear all flash messages.
 *
 * @return array An array of messages, each with ['type', 'message']
 */
function getFlashMessages(): array
{
    // Return and clear
    $messages = $_SESSION['flash'] ?? [];
    unset($_SESSION['flash']); // Clear them so they don’t persist
    return $messages;
}