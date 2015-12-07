<?php

namespace Ecl\Utils\Nettoyeur;

/**
 * Class NetoyeurUppercase
 * utilisé pour convertir le texte en capitales
 */
class NettoyeurUppercase
{
    /**
     * Méthode pour converir les chaines en capitales
     * 
     * @param [array] &$tableau Données de l'article
     * 
     * @return [empty]
     */
    public static function nettoyer(& $tableau)
    {
        foreach ($tableau as $cle => $valeur) {
            $tableau[$cle] = strtoupper($valeur);
        }
    }
}
