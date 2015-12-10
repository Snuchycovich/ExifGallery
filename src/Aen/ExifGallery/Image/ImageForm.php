<?php

namespace Aen\ExifGallery\Image;

use Aen\Utils\RenderTemplate\RenderTemplate;
use Aen\Utils\Nettoyeur\Nettoyeur;
use Aen\Utils\Nettoyeur\NettoyeurTrim;
use Aen\Utils\Nettoyeur\NettoyeurHtmlInterdit;
use Aen\Utils\Validateur\Validateur;
use Aen\Utils\Validateur as V;

class ImageForm extends RenderTemplate
{
    protected $image = '';
    //protected $error = array();

    public function __construct($image)
    {
        $this->image = $image;
        $this->setPath(__DIR__ . '/templates/');
    }
    




    /*public static function strategieNettoyage()
    {
        $nettoyeur = new Nettoyeur();
        $nettoyeur->ajouterNettoyeurCommun(new NettoyeurTrim())
                ->ajouterNettoyeurCommun(new NettoyeurHtmlInterdit());
        return $nettoyeur;
    }
    public function validation()
    {
        $validateur = new Validateur();
        $validateur->ajouter('titre', 'Il faut saisir un titre et recharger l\'image', new V\ValidateurRequired())
                //->ajouter('image', 'Vous devez charger un ficher', new V\ValidateurRequired())
        ->ajouter('photographe', 'Il faut saisir un photographe et recharger l\'image', new V\ValidateurRequired())
        ->ajouter('droits', 'Il faut saisir les droits et recharger l\'image', new V\ValidateurRequired());
        return $validateur;
    }*/

    /*public function valider()
    {
        $validateur = $this->validation();
        $this->erreurs = $validateur->valider($this->document);
        return empty($this->erreurs);
    }*/
    
    /**
     * Methode qui teste si le champ erreur est vide, pour retourner la valeur 
     * de l'erreur.
     *
     * @param [string] $name asigne le champ qu'on veut tester
     *
     * @return vide
     */
    /*public function getErreur($name)
    {
        if (isset($this->erreurs[$name])) {
            return $this->erreurs[$name];
        } else {
            return "";
        }
    }*/
    /**
    * Méthode pour enregistre les erreurs dans le tableau
    *
    * @param [array] $erreurs tableau d'erreurs
    *
    * @return vide
    */
    /*public function setErreurs($erreurs)
    {
        $this->erreurs = $erreurs;
    }*/
}
