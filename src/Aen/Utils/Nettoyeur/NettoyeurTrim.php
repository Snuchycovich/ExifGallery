<?php

namespace Ecl\Utils\Nettoyeur;

/**
 * Class qui permet nettoyer les espaces blanc au debut et à la fin de la valeur.
 */
class NettoyeurTrim
{
    /**
    * Méthode qui permet nettoyer les espaces blanc 
    * au debut et à la fin de la valeur.
    * 
    *@param string $valeur chaine à nettoyer 
    *
    * @return [chaine nettoyé
    */
    public static function nettoyer($valeur)
    {
        return trim($valeur);
    }
}
