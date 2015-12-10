<?php

namespace Ecl\Utils\UploadManager;

use Ecl\Emdn2\Image\Image;
use Ecl\Emdn2\Image\ImageBd;

class UploadManager
{
    public static function upload($data, $file)
    {
        if (isset($file)) {
            $tmpFile = $_FILES["file"]["tmp_name"];
            $idArticle = $data['idArticle'];
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($file['tmp_name']);
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
            $fileName = !empty($nameOfFile)?uniqid('articleFile_'. $idArticle .'_'):'';
            $chemin = $destination.$fileName.$extension;

            list($width, $height) = getimagesize($tmpFile);
        }
    }
}
