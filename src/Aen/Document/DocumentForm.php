<?php

namespace Aen\Document;

use Aen\Utils\Afficheur\Afficheur;

abstract class DocumentForm extends Afficheur implements DocumentFormInterface
{
    protected $document = '';
    /**
    * @var array récuperer les erreurs dans la saissie de 
    * chaque champ du formulaire.
    */
    private $erreurs = array();

    public function __construct(Document $document)
    {
        $this->document = $document;
    }
    public function valider()
    {
        $validateur = $this->validation();
        $this->erreurs = $validateur->valider($this->document);
        return empty($this->erreurs);
    }
    
    /**
     * Methode qui teste si le champ erreur est vide, pour retourner la valeur 
     * de l'erreur.
     *
     * @param [string] $name asigne le champ qu'on veut tester
     *
     * @return vide
     */
    public function getErreur($name)
    {
        if (isset($this->erreurs[$name])) {
            return $this->erreurs[$name];
        } else {
            return "";
        }
    }
    /**
    * Méthode pour enregistre les erreurs dans le tableau
    *
    * @param [array] $erreurs tableau d'erreurs
    *
    * @return vide
    */
    public function setErreurs($erreurs)
    {
        $this->erreurs = $erreurs;
    }
}
