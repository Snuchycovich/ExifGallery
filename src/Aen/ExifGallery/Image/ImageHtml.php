<?php

namespace Aen\ExifGallery\Image;

use Aen\Document\DocumentHtml;

class ImageHtml extends DocumentHtml
{

    public function __construct(Image $document)
    {
        $this->setPath(__DIR__ . '/templates/');
        parent::__construct($document);
    }
}
