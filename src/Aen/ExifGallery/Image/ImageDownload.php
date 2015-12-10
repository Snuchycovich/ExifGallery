<?php

namespace Aen\ExifGallery\Image;

class ImageDownload
{
    
    public static function download($image , $path, $type)
    {
        
        if (file_exists($path.$image)) {
            header('Content-Type: '.$type);
            header("Content-Disposition: attachment; filename=" . $image);
            //print file_get_contents($path.$image);
            header("Content-Description: File Transfer");
            header("Content-Length: " . filesize($path.$image));
            flush();
            $fp = fopen($path.$image, "r");
            while (!feof($fp)) {
                echo fread($fp, 65536);
                flush(); // this is essential for large downloads
            }
            fclose($fp);
        } else {
            echo($image." not found");
        }
    }
}
