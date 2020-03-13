<?php
namespace App;

use App\Http\Request;

/**
 * Description of Config
 *
 * @author Alex
 */
class Router {
    const PAGE_NOT_FOUND = '404';

    /** @var Request $request */
    private $request;

    /** @var array $routes */
    private $routes;

    public function __construct(
        Request $request,
        array $routes
    )
    {

        $this->request = $request;
        $this->routes = $routes;
    }

    public function getRoute(): Route
    {
        //die($this->request->getUri());
        $routeArgs = $this->routes[$this->request->getUri()] ?? $this->routes[self::PAGE_NOT_FOUND];
        $route = new Route(
            $routeArgs['route'],
            $routeArgs['controller'],
            $routeArgs['method'],
            $this->request
        );
        return $route;
    }
}
