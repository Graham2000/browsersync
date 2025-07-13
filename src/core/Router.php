<?php

namespace Core;

class Router
{
    private array $routes = [];

    public function get(string $path, $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post(string $path, $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function dispatch(string $uri): mixed
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        
        if (isset($this->routes[$method][$path])) {
            return $this->executeCallback($this->routes[$method][$path]);
        }
        
        foreach ($this->routes[$method] as $routePath => $callback) {
            if ($this->matchRoute($routePath, $path, $params)) {
                return $this->executeCallback($callback, $params);
            }
        }
        
        http_response_code(404);
        return '404 - Page Not Found';
    }

    private function matchRoute(string $routePath, string $requestPath, &$params): bool
    {
        $pattern = preg_replace('/\{([^}]+)\}/', '([^/]+)', $routePath);
        $pattern = '#^' . $pattern . '$#';
        
        if (preg_match($pattern, $requestPath, $matches)) {
            $params = [];
            
            preg_match_all('/\{([^}]+)\}/', $routePath, $paramNames);
            
            for ($i = 1; $i < count($matches); $i++) {
                $params[$paramNames[1][$i - 1]] = $matches[$i];
            }
            
            return true;
        }
        
        return false;
    }

    private function executeCallback($callback, array $params = []): mixed
    {
        if (is_array($callback) && is_string($callback[0])) {
            $controllerClass = $callback[0];
            $methodName = $callback[1];
            
            $controller = new $controllerClass();
            
            if (!empty($params)) {
                return $controller->$methodName($params);
            }
            
            return $controller->$methodName();
        }
        
        return call_user_func($callback);
    }
}