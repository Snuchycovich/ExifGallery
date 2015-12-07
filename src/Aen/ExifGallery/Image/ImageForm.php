<?php

namespace Aen\Emdn2\Image;

use Aen\Document\DocumentForm;
use Aen\Utils\Nettoyeur\Nettoyeur;
use Aen\Utils\Nettoyeur\NettoyeurTrim;
use Aen\Utils\Nettoyeur\NettoyeurHtmlInterdit;
use Aen\Utils\Validateur\Validateur;
use Aen\Utils\Validateur as V;

class ImageForm extends DocumentForm
{


    public function __construct(Image $document)
    {
        $this->setPath(__DIR__ . '/templates/');
        parent::__construct($document);
    }
    public static function strategieNettoyage()
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
    }
}
