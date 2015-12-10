<?php

namespace Ecl\Utils\Encodeur;

/**
 * Class Encodeur
 * Permet de rassembler les encodeurs à utiliser
 */
class Encodeur
{
    /**
     * Rableau pur ressambler les encodeurs
     * @var [array]
     */
    protected $encodeurs;
    /**
     * Constructeur
     * Por definir la variable encodeurs comme un tableau 
     */
    public function __construct()
    {
        $this->encodeurs = array();
    }
    /**
     * Méthode qui permet de ajouter des encodeurs au tableau
     * 
     * @param  [string] $encodeur le encodeur à ajouter
     * 
     * @return [empty] 
     */
    public function ajouter($encodeur)
    {
        $this->encodeurs[] = $encodeur;
    }
    /**
     * Méthode qui permet de appliquer les encodeurs gardes 
     * dans le tableau
     * @param  [qrry] $tableau Tableau des encodeurs
     * 
     * @return [array] tableau avec les methodes pour encoder;
     */
    public function encoder($tableau)
    {
        foreach ($this->encodeurs as $encodeur) {
            $encodeur::encoder($tableau);
        }
        return $tableau;
    }
}
