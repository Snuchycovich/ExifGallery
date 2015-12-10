<?php

namespace Ecl\Utils\Validateur;

/**
 * Class ValidateurEmail
 * Permet de definir le validateur pour une adresse mail
 */
class ValidateurEmail
{
    /**
     * Méthode qui define le validateur pour une adresse mail
     * 
     * @param  string $value valeur à valider
     * 
     * @return [boolean] résultat de la validation
     */
    public function valider($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
