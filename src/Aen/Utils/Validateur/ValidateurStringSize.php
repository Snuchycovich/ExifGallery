<?php

namespace Ecl\Utils\Validateur;

/**
 * Teste si la chaine est d'une longueur superieur à un valeur donné
 */
class ValidateurStringSize
{
    /**
    * Assigne le nombre de caractères de la chaine
    * 
    * @var [int] longuer de la chaine
    */
    protected $size;
    /**
     * Constructeur de la class
     * 
     * @param [int] $size longueur minimale de la chaine
     */
    public function __construct($size)
    {
        $this->size = $size;
    }
    /**
     * Méthode qui define le validateur pour la longueur d'une chaine
     * 
     * @param [string] $valeur valeur à valider
     * 
     * @return [booléen] résultat de la validation
     */
    public function valider($valeur)
    {
        return (strlen($value) <= $size);
    }
}
