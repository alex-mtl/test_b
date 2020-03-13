<?php


namespace App\Controller;

use App\Http\Request;

abstract class Controller
{
    /** @var Request */
    private $request;

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    abstract public function get();
}