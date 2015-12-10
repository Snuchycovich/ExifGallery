<?php

namespace Ecl\Utils\UploadManager;

use Ecl\Emdn2\Image\Image;
use Ecl\Emdn2\Image\ImageBd;

class UploadManager
{
    public static function upload($file, $data)
    {
        try {
            $tmp_name = !empty($file["tmp_name"])?$file["tmp_name"]:'';
            $nameOfFile = !empty($file["name"])?$file["name"]:'';
            if (! $file['error'] == UPLOAD_ERR_NO_FILE || empty($temp_name)) {
                //throw new UploadException("Il n'y a pas de fichier", UPLOAD_ERR_NO_FILE);
            } else {
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
                //var_dump($fileName);
                if (! move_uploaded_file($tmp_name, $chemin)) {
                    throw new UploadException('Problème pendant l\'enregitrement du fichier');
                }
            }
            return $chemin;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
