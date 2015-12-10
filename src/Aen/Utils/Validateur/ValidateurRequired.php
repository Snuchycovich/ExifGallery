<?php

namespace Ecl\Utils\Validateur;

/**
 * Class ValidateurRequire permet de valide si les champs
 *obliatoires sont remplis
 */
class ValidateurRequired
{
    /**
     * [valider description]
     * 
     * @param $value valor a valider
     * 
     * @return boolean resultat de la validation
     */
    public static function valider($value)
    {
        return strlen($value) != 0;
    }
}
