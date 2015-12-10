<?php

namespace Ecl\Utils\Nettoyeur;

/**
 * Class NettoyeurBalise énleve les balises  HTML 
 */
class NettoyeurHtmlInterdit
{
    /**
    * [Méthode qui énleve les balises HTML 
    * 
    * @param string $valeur à nettoyer
    * 
    * @return string nettoyé
    */
    public static function nettoyer($valeur)
    {
        return strip_tags($valeur);
    }
}
