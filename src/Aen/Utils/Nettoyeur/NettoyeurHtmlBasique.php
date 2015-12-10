<?php

 namespace Ecl\Utils\Nettoyeur;
 
/**
* Nettoyeur permettant d'autoriser des balises données.
*
* Le constructeur permet de spécifier les balises qui seront autorisées.
* Voir le manuel PHP de strip_tags pour la définition de la liste.
*
* @package Ecl\Utils\Nettoyeur
*/
class NettoyeurHtmlBasique
{

    /**
    * @var string liste des balises autorisées
    */
    protected $allowedTags;

    /**
    * @param string $tags liste des balises autorisées
    */
    public function __construct($tags)
    {
        $this->allowedTags = $tags;
    }

    /**
    * @param string $valeur chaine à nettoyer
    * 
    * @return string chaine nettoyée
    */
    public function nettoyer($valeur)
    {
        return strip_tags($valeur, $this->allowedTags);
    }
}
