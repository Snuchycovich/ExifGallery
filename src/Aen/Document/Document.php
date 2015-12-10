<?php

namespace Aen\Document;

use Aen\Document\Document;

abstract class Document implements DocumentInterface
{
    protected $id;
    protected $dateCrea;
    
    protected function __construct($data = array())
    {
        $this->id = $data['id'];
        $this->dateCrea = $data['dateCrea'];
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function getDateCrea()
    {
        return $this->dateCrea;
    }

    public function setDateCrea($dateCrea)
    {
        return $this->dateCrea = $dateCrea;
    }
}
