<?php
/**
 * Author: Vehsamrak
 * Date Created: 19.01.16 22:28
 */

namespace Router;

use Framework\AbstractController;

class Router
{

    const INDEX_NAME = 'index';

    public function run()
    {
        $routes = $this->parseRoutes();
        $controllerName = $this->getControllerName($routes);
        $action = $this->getAction($routes);

        /** @var AbstractController $controller */
        $controller = new $controllerName;

        return $controller->processAction($action);
    }

    /**
     * @return array
     */
    private function parseRoutes(): array
    {
        $pathInfo = $_SERVER['PATH_INFO'] ?? null;

        return $pathInfo ? explode('/', $pathInfo) : [];
    }

    /**
     * @param array $routes
     */
    private function getControllerName(array $routes): string
    {
        $route = self::INDEX_NAME;

        if (isset($routes[1])) {
            $route = strtolower($routes[1]);
        }

        return 'Controller\\' . ucfirst($route) . 'Controller';
    }

    /**
     * @param array $routes
     */
    private function getAction(array $routes): string
    {
        $action = self::INDEX_NAME;

        if (isset($routes[2])) {
            $action = strtolower($routes[2]);
        }

        return $action;
    }
}
