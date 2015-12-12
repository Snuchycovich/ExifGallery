<?php

namespace Aen\ExifGallery\Image;

use Aen\ExifGallery\Image\ImageUploader;
use Aen\Library\ExifTool\ExifTool;
use Aen\Library\ExifTool\FileModel;

require_once("ImageUploader.php");
require_once("../../Library/ExifTool/ExifTool.php");
require_once("../../Library/ExifTool/FileModel.php");

$uploader = new ImageUploader("../../../../uploads/");
$uploaded_file=$uploader->upload();

if (isset($uploaded_file)) {
    $exiftool = new ExifTool("");
    $model = new FileModel(pathinfo(basename($uploaded_file))['filename'] . ".json", "../../../../data/");
    $metas=$exiftool->getMetadata($uploaded_file);
    $model->saveToFile($metas);

    $exiftool->getXMPdata($uploaded_file,"../../../../data/xmp/".pathinfo(basename($uploaded_file))['filename'] . ".xmp");

    $img = array(
        'name' => isset($metas[0]["XMP"]["Title"])?$metas[0]["XMP"]["Title"]:'',
        'creator' => isset($metas[0]['XMP']["Creator"])?$metas[0]['XMP']["Creator"]:'',
        'filename' => pathinfo(basename($uploaded_file))['filename'],
        'url' => "uploads/".$metas[0]["File"]["FileName"]
    );

    appendToFile("../../../../images.json", json_encode($img));
}

function appendToFile($file, $data = array())
{
    if (file_exists($file)) {
        $inp = file_get_contents($file);
        $tempArray = json_decode($inp, true);
        if (isset($tempArray) && !empty($tempArray)) {
            array_push($tempArray, $data);
        } else {
            $tempArray=[$data];
        }
            
        $jsonData = json_encode($tempArray);
        file_put_contents($file, $jsonData);
    } else {
        echo json_encode(["error"=>"not exists"]);
    }
}
