<?php
namespace App\Core\Router;


class Router
{
    protected array $routes = [
        'GET'    => [],
        'POST'   => [],
        'PUT'    => [],
        'DELETE' => [],
    ];

    /**
     * Register a GET route
     */
    public function get(string $uri, callable|array $handler): void
    {
        $this->routes['GET'][$uri] = $handler;
    }

    /**
     * Register a POST route
     */
    public function post(string $uri, callable|array $handler): void
    {
        $this->routes['POST'][$uri] = $handler;
    }

    /**
     * Register a PUT route
     */
    public function put(string $uri, callable|array $handler): void
    {
        $this->routes['PUT'][$uri] = $handler;
    }

    /**
     * Register a DELETE route
     */
    public function delete(string $uri, callable|array $handler): void
    {
        $this->routes['DELETE'][$uri] = $handler;
    }

    /**
     * Dispatch the request to the correct handler
     */
    public function dispatch(string $method, string $uri)
    {
        $method = strtoupper($method);
    
        $handler = $this->routes[$method][$uri] ?? null;
        
        if (!$handler) {
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found";
            return;
        }
        
        if (is_callable($handler)) {
            return call_user_func($handler);
        }
        
        [$class, $action] = $handler;
        $controller = new $class();
        return $controller->$action();
    }
    

    /**
     * Get the URL for a given URI
     */
    public function getUrl(string $uri): string
    {
        // Check if route exists and return it, otherwise return '#'
        return isset($this->routes['GET'][$uri]) ? $uri : '#';
    }
}
