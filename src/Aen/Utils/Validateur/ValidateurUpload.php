<?php

namespace Ecl\Utils\Validateur;

/**
 * Class ValidateurUpload
 *
 */
class ValidateurUpload
{
    public static function valider($value)
    {
        var_dump($value);
        return ($value['image']['error']) == '4';
    }
}
