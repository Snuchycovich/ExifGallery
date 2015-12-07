<?php

namespace Ecl\Document;

interface DocumentInterface
{
    public static function initialize($rawData = array());
    public function modifier($data);
}
