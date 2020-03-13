<?php
namespace App\Http;

class Request {
    const POST = 'post';
    const GET = 'get';

    /** @var string $type */
    private $type;
    /** @var string $uri */
    private $uri;
    /** @var array $params */
    private $params;

    public function __construct()
    {
        $this->setType($_SERVER['REQUEST_METHOD']);
        $pathInfo = pathinfo($_SERVER['REQUEST_URI']);
        //die(print_r($pathInfo));
        $uri = $pathInfo['dirname'].(($pathInfo['dirname'] === '/') ? '' : '/').$pathInfo['basename'];
        $this->setUri($uri);
        $this->setParams($_REQUEST);

        //die(var_dump($pathInfo, $this));
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    /**
     * @param string $uri
     */
    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }
}
