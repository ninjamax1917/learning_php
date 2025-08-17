<?php

include_once 'vendor/autoload.php';

class Route
{
    public function __construct(
        private string $uri,
        private string $method,
        private $action
    ) {}

    public static function get(string $uri, $action): static
    {
        return new static($uri, 'GET', $action);
    }

    public static function post(string $uri, $action): static
    {
        return new static($uri, 'POST', $action);
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getAction(): callable
    {
        return $this->action;
    }
}

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct()
    {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (! $route) {
            $this->notFound();

            return;
        }

        $route->getAction()();

    }

    private function notFound(): void
    {
        echo '404 Not Found';
        exit;
    }

    private function findRoute(string $uri, string $method): Route|false
    {
        if (! isset($this->routes[$method][$uri])) {
            return false;
        }

        return $this->routes[$method][$uri];
    }

    private function initRoutes(): void
    {
        $routes = $this->getRoutes();
        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    /**
     * @return Route[  ]
     */
    private function getRoutes(): array
    {
        return require_once APP_PATH.'/config/routes.php';
    }
}

dd(Route::get('/main', function () {
    include_once APP_PATH.'/views/pages/main.view.php';
}));
