<?php

namespace Aen\ExifGallery\Image;

use Aen\Utils\RenderTemplate\RenderTemplate;

class ImageHtml extends RenderTemplate
{

    protected $image = '';
    
    public function __construct($image)
    {
        $this->image = $image;
        $this->setPath(__DIR__ . '/templates/');
    }
}
