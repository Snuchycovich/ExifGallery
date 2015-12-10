<?php

namespace Ecl\Utils\UploadManager;

class UploadException extends \Exception
{
    public function __construct($message, $code = null)
    {
        parent::__construct($message, $code);
    }
}
