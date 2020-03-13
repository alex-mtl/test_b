<?php
namespace App;


use App\Http\Request;
use App\Config;
use App\Model\Clients;

/**
 * Description of App
 *
 * @author Alex
 */
class App {
    /** @var Request $request */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function run() {
        $router = new Router($this->request, Config::getConfig('routes'));
        /** @var Route $route */
        $route = $router->getRoute();
        $route->response();
    }
}