<?php

namespace Aen\Library\Controller;

class Request
{
    protected $get;
    protected $post;
    protected $file;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->file = $_FILES;
    }

    public function setGetParam($key, $value)
    {
        $this->get[$key] = $value;
        return $this;
    }

    public function getGetParam($key)
    {
        if (!isset($this->get[$key])) {
            throw new \Exception("Paramètre '{$key}' non existant");
        }
        return $this->get[$key];
    }
    public function testGetParam($key)
    {
        if (!isset($this->get[$key])) {
            return false;
        }
        return true;
    }
    public function getGetAllParms()
    {
        return $this->get;
    }
    
    public function setPostParam($key, $value)
    {
        $this->post[$key] = $value;
        return $this;
    }

    public function getPostParam($key)
    {
        if (!isset($this->post[$key])) {
            throw new \Exception("Paramètre '{$key}' non existant");
        }
        return $this->post[$key];
    }
    public function getPostAllParms()
    {
        return $this->post;
    }

    public function setFileParam($key, $value)
    {
        $this->file[$key] = $value;
        return $this;
    }

    public function getFileParam($key)
    {
        if (!isset($this->file[$key])) {
            throw new \Exception("Paramètre '{$key}' non existant");
        }
        return $this->file[$key];
    }
    public function getFileAllParms()
    {
        return $this->file;
    }
}
