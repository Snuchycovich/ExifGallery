<?php

namespace Ecl\Utils\UploadManager;

use Ecl\Emdn2\Image\Image;
use Ecl\Emdn2\Image\ImageBd;

class UploadManager
{
    public static function upload($data, $file)
    {
        $tmp_name = !empty($file["tmp_name"])?$file["tmp_name"]:'';
        if ($file['error'] == UPLOAD_ERR_NO_FILE || empty($tmp_name)) {
            throw new UploadException("Il n'y a pas de fichier");
        } else {
            $idArticle = $data['idArticle'];
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($file['tmp_name']);
            //echo $mime;
            switch ($mime){
                case 'image/jpeg':
                    $extension = ".jpg";
                    $destination = IMAGES_PATH;
                    break;
                case 'image/png':
                    $extension = ".png";
                    $destination = IMAGES_PATH;
                    break;
                case 'image/gif':
                    $extension = ".gif";
                    $destination = IMAGES_PATH;
                    break;
                case 'application/pdf':
                    $extension = ".pdf";
                    $destination = DOCS_PATH;
                    break;
                default:
                    throw new UploadException("Ce n'est pas le bon type de fichier");
                    break;
            }
            $fileName = uniqid('articleFile_'. $idArticle .'_');
            $filePath = $destination.$fileName.$extension;
            move_uploaded_file($file['tmp_name'], $filePath);
            return $filePath;
        }

    }
    public static function downloadFlickr($data)
    {
        $nomFichier = uniqid('flickrImage_').'.jpg';
        $ch = curl_init($data['chemin']);
        $fp = fopen("./data/images/".$nomFichier, 'w+');
        $proxy = "http://proxy.unicaen.fr:3128";
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        $data['chemin'] = "data/images/".$nomFichier;
        return $data;
    }

    public static function thumbImage($imgPath, $width, $height, $blur = 1, $bestFit = 0, $cropZoom = 1)
    {
        $dir = dirname($imgPath);
            $imagick = new \Imagick(realpath($imgPath));
        if ($imagick->getImageHeight() > $imagick->getImageWidth()) {
            $w = $width;
            $h = 0;
        } else {
            $h = $height;
            $w = 0;
        }
        $imagick->resizeImage($w, $h, $imagick::DISPOSE_UNDEFINED, $blur, $bestFit);
        $cropWidth = $imagick->getImageWidth();
        $cropHeight = $imagick->getImageHeight();

        if ($cropZoom) {
            $imagick->cropImage($width, $height, ($imagick->getImageWidth() - $width)/2, ($imagick->getImageHeight() - $height)/2);
        }

        $direct = 'thumbs/';
        $pathToWrite = $dir."/".$direct;
        //var_dump($pathToWrite);
        if (!file_exists($pathToWrite)) {
            mkdir($pathToWrite, 0777, true);
        }
        $newImageName = 'thumb_'.basename($imgPath);
        //var_dump($newImageName);
        $imagick->writeImage($pathToWrite.'thumb_'.basename($imgPath));
        return $pathToWrite.$newImageName;
    }

    public static function mediumResize($imgPath, $width, $height, $blur = 1, $bestFit = 0)
    {
        $dir = dirname($imgPath);
        $imagick = new \Imagick(realpath($imgPath));
        
        $imagick->thumbnailImage($width, $height);

        $direct = 'mediums/';
        $pathToWrite = $dir."/".$direct;
        //var_dump($pathToWrite);
        if (!file_exists($pathToWrite)) {
            mkdir($pathToWrite, 0777, true);
        }
        $newImageName = 'm_'.basename($imgPath);
        //var_dump($newImageName);
        $imagick->writeImage($pathToWrite.'m_'.basename($imgPath));
        return $pathToWrite.$newImageName;
    }
}
