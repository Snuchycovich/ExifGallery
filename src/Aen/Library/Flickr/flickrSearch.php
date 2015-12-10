<?php

namespace Aen\Library\Flickr;

use Aen\Library\Flickr\Flickr;

require_once("Flickr.php");

$Flickr = new Flickr('e9d736c6e88d3848b053cf70aa883080');
$data = $Flickr->search(implode(" ", $_POST["q"]));


$images = $data['photos']['photo'];
require_once("flickr.tpl.php");
