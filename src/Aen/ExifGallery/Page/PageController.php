<?php

namespace Aen\ExifGallery\Page;

use Aen\Document\DocumentController;

class PageController extends DocumentController
{
    
    public function home()
    {
        $this->title = "Welcome";
        $this->output = file_get_contents(__DIR__.'/templates/home.php');
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    public function about()
    {
        $this->title = "About";
        $this->output = "info technique";
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }
}
