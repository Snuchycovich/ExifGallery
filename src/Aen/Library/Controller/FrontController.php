<?php

namespace Aen\Library\Controller;

class FrontController
{
    
    public function __construct($router)
    {
        $this->router = $router;
    }
    /*public function run()
    {
        $controller = new $this->controllerClass();
        return $controller->{$this->action}();
    }*/
    public function run(Request $request, Response $response)
    {
        $className = $this->router->getController();
        $controller = new $className($request, $response);
        $action = $this->router->getAction();
        return $controller->{$action}();
    }
}
