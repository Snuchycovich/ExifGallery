<?php

namespace Aen\Library\Controller;

class Response
{
    protected $parts;

    public function __construct($parts = array())
    {
        $this->parts = $parts;
    }
    public function setPart($key, $content)
    {
        $this->parts[$key] = $content;
    }
    public function getPart($key)
    {
        if (isset($this->parts[$key])) {
            return $this->parts[$key];
        } else {
            throw new \Exception("Partie '{$key}' non existante");
        }
    }
}
