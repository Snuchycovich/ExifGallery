<?php

namespace Aen\Library\Controller;

class AbstractRouter
{
    protected $controllerClass;
    protected $action;
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
        $this->parseUri();
    }
    public function getController()
    {
        return $this->controllerClass;
    }
    public function getAction()
    {
        return $this->action;
    }
}
