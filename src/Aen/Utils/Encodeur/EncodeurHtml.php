<?php

namespace Ecl\Utils\Encodeur;

/**
 * Class Encodage 
 * Permet d'encoder les charactères "<" ">" et "&" et les " et '
 */
class EncodeurHtml
{
    /**
     * Permet d'encoder le string passé comme argument
     * 
     * @param [string] $string la valeur à encoder
     * 
     * @return [string]
     */
    public static function htmlEncodageString($string)
    {
        return htmlspecialchars($string, ENT_COMPAT | ENT_HTML5, 'UTF-8');
    }

    /**
     * Permet appliquer l'encodage en parcourant un tabeau
     * 
     * @param [array] $tableau Ensemble de données
     * 
     * @return [empty]
     */
    public static function encoder(&$tableau)
    {
        foreach ($tableau as $cle => $valeur) {
            $tableau[$cle] = EncodageHtml::htmlEncodageString($valeur);
        }
        //var_dump($tableau);
    }
}
