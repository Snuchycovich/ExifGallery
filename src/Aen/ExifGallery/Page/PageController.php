<?php

namespace Aen\ExifGallery\Page;

use Aen\Document\DocumentController;
use Aen\ExifGallery\Image\ImageJson;

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
        $list = ImageJson::readList();
        $this->title = "About";
        $this->OGMeta = '';
        $this->tweetCards = '<meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/index.php?t=page&a=about" />
        <meta name="twitter:title" content="Exif Gallery World Map" />
        <meta name="twitter:description" content="Technical informations about the project and collaborators" />
        <meta name="twitter:image" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/'.json_decode($list[0], true)['url'].'" />';
        $this->output = file_get_contents(__DIR__.'/templates/about.php');
        $this->response->setPart('OGMeta', $this->OGMeta);
        $this->response->setPart('tweetCards', $this->tweetCards);
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    public function func404()
    {
        $this->title = "Error 404";
        $this->output = file_get_contents(__DIR__.'/templates/404.php');
        $this->response->setPart('OGMeta', "");
        $this->response->setPart('tweetCards', "");
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }
}
