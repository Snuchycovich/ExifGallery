<?php

namespace Aen\Document;

use Aen\Utils\RenderTemplate\RenderTemplate;

abstract class DocumentHtml extends RenderTemplate
{
    protected $document = '';

    public function __construct(Document $document)
    {
        $this->document = $document;
    }
}
