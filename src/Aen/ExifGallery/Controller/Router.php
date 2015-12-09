<?php

namespace Aen\ExifGallery\Controller;

use Aen\Library\Controller\AbstractRouter;

class Router extends AbstractRouter
{

    public function parseUri()
    {

        if ($this->request->testGetParam('t')) {
            $controller = $this->request->getGetParam('t');
        } else {
            $controller = 'image';
        }

        switch($controller) {
            case 'image':
                $this->controllerClass = 'Aen\ExifGallery\Image\ImageController';
                break;
            case 'page':
                $this->controllerClass = 'Aen\ExifGallery\Page\PageController';
                break;
            default:
                $this->controllerClass = 'Aen\ExifGallery\Page\PageController';
                break;
        }
        
        if (!class_exists($this->controllerClass)) {
            throw new \Exception("Class {$this->controllerClass} non existante");
        }

        if ($this->request->testGetParam('a')) {
            $this->action = $this->request->getGetParam('a');
        } else {
            $this->action = 'home';
        }
        
        if (!method_exists($this->controllerClass, $this->action)) {
            throw new \Exception("Action {$this->action} non existante");
        }
        return $this;
    }
}
