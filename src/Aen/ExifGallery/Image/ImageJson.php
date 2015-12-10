<?php

namespace Aen\ExifGallery\Image;

class ImageJSON
{

    public static function readList()
    {
        $images = json_decode(trim(file_get_contents("images.json")), true);
        return $images;
    }

    public static function readImage($nom)
    {
        $image = json_decode(trim(file_get_contents("./data/".$nom.".json")), true);
        return $image;
    }
}
