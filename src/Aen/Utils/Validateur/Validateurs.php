<?php

namespace Ecl\Utils\Validateur;

/**
 * Class Validateur 
 * Permet de rassambler les différents outils de validation
 */
class Validateur
{
    /**
     * Tableau d'erreurs
     * 
     * @var array
     */
    protected $erreurs = array();
    /**
     * Méthode pour tester les champs
     * 
     * @param [array] $article Ensemble de données de l'article
     * 
     * @return [array] Tableau erreurs vide
     */
    public function valider($article)
    {

        if ($article->getTitre() == "") {
            $this->erreurs['titre'] = "Il faut rentrer un titre";
        }
        if ($article->getAuteur() == "") {
            $this->erreurs['auteur'] = "Il faut rentrer un auteur";
        }
        if ($article->getContenu() == "") {
            $this->erreurs['contenu'] = "Il faut rentrer l'article";
        }
        return empty($this->erreurs);
    }
    public function validerImage($image)
    {
        if ($image->getTitre() == "") {
            $this->erreurs['titre'] = "Il faut rentrer un titre";
        }
        if ($image->getPhotographe() == "") {
            $this->erreurs['photographe'] = "Il faut rentrer un Photographe";
        }
        if ($image->getDroits() == "") {
            $this->erreurs['droits'] = "Il faut rentrer les droits";
        }
    }
    /**
     * Accesseur tableau erreurs
     * 
     * @return [array] tableau erreurs
     */
    public function getErreurs()
    {
        return $this->erreurs;
    }
}
