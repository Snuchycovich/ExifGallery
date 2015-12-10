<?php

namespace Ecl\Utils\Validateur;

/**
 * Class Validateur 
 * Permet de rassambler les différents outils de validation
 */
class Validateur
{
    protected $validateurs = array();

    public function ajouter($propriete, $message, $validateur)
    {
        $this->validateurs[] =  array($propriete, $message, $validateur);
        return $this;
    }

    public function valider($objet)
    {
        $erreurs = array();
        foreach ($this->validateurs as $validateurItem) {
            $propriete = $validateurItem[0];
            $message = $validateurItem[1];
            $validateur = $validateurItem[2];

            $getter = 'get' . ucfirst($propriete);
            if (!method_exists($objet, $getter)) {
                $message = "Méthode {$getter} non existante pour la classe " . get_class($objet);
                throw new \Exception($message);
            }
            $value = $objet->$getter();

            if (! $validateur->valider($value)) {
                $erreurs[$propriete] = $message;
            }
        }
        return $erreurs;
    }
}
