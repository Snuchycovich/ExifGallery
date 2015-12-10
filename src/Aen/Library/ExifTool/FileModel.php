<?php

namespace Aen\Library\ExifTool;

class FileModel
{
    private $fileName;
    private $filePath;

    public function __construct($fileName, $filePath)
    {
        $this->fileName = $fileName;
        $this->filePath = $filePath;
    }

    public function getFileContent()
    {
        $details = file_get_contents($this->filePath.$this->fileName);
        return json_decode($details, TRUE)[0];
    }

    public function saveToFile($data = [])
    {
        /*$f = fopen($this->filePath.$this->fileName, "w");
        foreach ($data as $item){
            fwrite($f, print_r($item, true));
        }
        fclose($f);*/
        file_put_contents($this->filePath.$this->fileName,json_encode($data));
    }
}
