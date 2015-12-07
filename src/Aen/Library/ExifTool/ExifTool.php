<?php

namespace Aen\Library\ExifTool;

class ExifTool
{
    private $image_path;


    public function __construct($image_path)
    {
        $this->image_path = $image_path;

    }


    public function getMetadata($image)
    {
        $data = array();
        if (file_exists($this->image_path . $image)) {
            exec("exiftool -g -json {$this->image_path}{$image}", $data);
        }
        return (json_decode(implode($data),true));

    }

    public function getXMPdata($image)
    {
        if (file_exists($this->image_path . $image) && !file_exists("../data/xmp/". pathinfo(basename($image))['filename'] . ".xmp")) {
            exec("exiftool -xmp -b {$this->image_path}{$image} -o ../data/xmp/" . pathinfo(basename($image))['filename'] . ".xmp");
        }
    }

    public function setMetadata($image,$src)
    {
        exec("exiftool -json={$src} {$this->image_path}{$image}");
    }


}