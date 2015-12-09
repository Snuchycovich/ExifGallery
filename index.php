<?php

namespace Aen\ExifGallery;

use Aen\Utils\Autoloader\Autoloader;

use Aen\Library\Authentication\AuthHtml;
use Aen\Library\Authentication\AuthManager;
use Aen\Library\Authentication\AuthException;

use Aen\Library\Controller\FrontController;
use Aen\Library\Controller\Request;
use Aen\Library\Controller\Response;
use Aen\ExifGallery\Controller\Router;

session_name('exifGallery2');
session_start();

require_once 'src/Aen/Utils/Autoloader/Autoloader.php';
require_once 'config/config.php';

Autoloader::register();

//var_dump(file_exists('src/Aen/Library/Flickr/flickrSearch.php'));
$title = '';
$output = '';


try {
    $request = new Request();
    $response = new Response();
    $router = new Router($request);
    $controller = new FrontController($router);
    $result = $controller->run($request, $response);
    $title = $response->getPart('title');
    $output = $response->getPart('output');
} catch (\Exception $e) {
    $title = "Une erreur s'est glissée dans cette page";
    $output = $e->getMessage();
    $output .= "<pre>{$e->getTraceAsString()}</pre>";
}


ob_start();
require_once 'ui/pages/squelette.html';
$html = ob_get_contents();
ob_end_clean();

echo $html;
