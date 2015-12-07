<?php

namespace Aen\Document;

use Aen\Document\DocumentControllerInterface;

abstract class DocumentController implements DocumentControllerInterface
{
    protected $html = '';
    protected $title = '';
    protected $request;
    protected $response;

    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function actionDefault()
    {
        return $this->ACTION_NAME;
        var_dump($this->ACTION_NAME);
    }
}
