<?php

namespace Ecl\Utils\Nettoyeur;

/**
 * Class Nettoyeur
 * Permet de rassembler les nettoyeurs à utiliser
 */
class Nettoyeur
{
    /**
     * @var array tableau de nettoyeurs à utiliser pour  
     */
    protected $nettoyeursCommuns = array();
    /**
     * [$nettoyeursIndividuels description]
     * @var array
     */
    protected $nettoyeursIndividuels = array();
    
    /**
     * Méthode pour ajourter un nettoyeur au tableau
     *
     * @param objet $nettoyeur instance de nettoyeur
     *
     * @return objet return l'objet lui-même
     */
    public function ajouterNettoyeurCommun($nettoyeur)
    {
        $this->nettoyeursCommuns[] = $nettoyeur;
        return $this;
    }

    public function ajouterNettoyeurIndividuel($cle, $nettoyeur)
    {
        if (!isset($this->nettoyeursIndividuels[$cle])) {
            $this->nettoyeursIndividuels[$cle] = array();
        }
        $this->nettoyeursIndividuels[$cle][] = $nettoyeur;
        return $this;
    }

    public function nettoyer($tableau)
    {
        // recopier le tableau pour ensuite faire le nettoyage
        $data = $tableau;
        foreach ($data as $cle => $valeur) {
            if (isset($this->nettoyeursIndividuels[$cle])) {
                // la clé correspond à un nettoyage spécifique
                $nettoyeurs = $this->nettoyeursIndividuels[$cle];
            } else {
                // la clé utilise le nettoyage par défaut
                $nettoyeurs = $this->nettoyeursCommuns;
            }
            foreach ($nettoyeurs as $nettoyeur) {
                // nettoyer la valeur correspondant et modifier le tableau
                $data[$cle] = $nettoyeur->nettoyer($data[$cle]);
            }
        }
        return $data;
    }
}
