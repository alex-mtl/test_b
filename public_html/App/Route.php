<?php
namespace App;

use App\Controller\Controller;
use App\Http\Request;

class Route
{
    /** @var Request $request */
    private $request;
    /** @var string $route */
    private $route;
    /** @var string $controllerClass*/
    private $controllerClass;
    /** @var string $method */
    private $method;

    public function __construct(
        string $route,
        string $controllerClass,
        string $method = Request::GET,
        Request $request
    )
    {
        $this->request = $request;
        $this->route  = $route;
        $this->controllerClass = $controllerClass;
        $this->method = $method;
    }

    public function response() {
        $controllerClass = $this->controllerClass;
        /** @var Controller $controller */
        $controller = new $controllerClass();
        $controller->setRequest($this->request);
        $controller->{$this->method}();
    }
}