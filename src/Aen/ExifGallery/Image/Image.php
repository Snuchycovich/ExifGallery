<?php

namespace Ecl\Emdn2\Image;

use Ecl\Document\Document;

/**
 * Class Article
 * Permet de creer notre objet Article
 *  
 *@author Emiliano Castillo <emiliano.caslep@gmail.com>
 */
class Image extends Document
{
  
    protected $idArticle = "";
    protected $chemin = "";
    protected $thumb = "";
    protected $medium = "";
    protected $titre = "";
    protected $photographe = "";
    protected $droits = "";
   

    /** 
    * Constructeur de notre objet article
    * 
    *@param [$data] $data Ensemble de donnée de notre objet Article.
    */
    protected function __construct($data = array())
    {
        parent::__construct($data);
        //$this->_id = $data['id'];
        $this->idArticle = $data['idArticle'];
        $this->chemin = $data['chemin'];
        $this->thumb = $data['thumb'];
        $this->medium = $data['medium'];
        $this->titre = $data['titre'];
        $this->photographe = $data['photographe'];
        $this->droits = $data['droits'];
        //$this->_dateCrea = $data['dateCrea'];
    }

    /**
    * Methode pour initializer notre objet Article
    * 
    *@param [array] $rawData tableau vide mais qu'il peut contenir les donnée de
    * de chaque champ
    *
    *@return [array] le objet
    */
    public static function initialize($rawData = array())
    {
        $data = array();
        if (isset($rawData['id']) && (trim($rawData['id']) != '')) {
            $data['id'] = (int) $rawData['id'];
        } else {
            $data['id'] = null;
        }

        if (isset($rawData['idArticle']) && (trim($rawData['idArticle']) != '')) {
            $data['idArticle'] = (int) $rawData['idArticle'];
        } else {
            $data['idArticle'] = null;
        }

        if (isset($rawData['chemin']) && (trim($rawData['chemin']) != '')) {
            $data['chemin'] = $rawData['chemin'];
        } else {
            $data['chemin'] = '';
        }
        if (isset($rawData['thumb']) && (trim($rawData['thumb']) != '')) {
            $data['thumb'] = $rawData['thumb'];
        } else {
            $data['thumb'] = '';
        }
        if (isset($rawData['medium']) && (trim($rawData['medium']) != '')) {
            $data['medium'] = $rawData['medium'];
        } else {
            $data['medium'] = '';
        }
        if (isset($rawData['titre']) && (trim($rawData['titre']) != '')) {
            $data['titre'] = $rawData['titre'];
        } else {
            $data['titre'] = '';
        }
        if (isset($rawData['photographe']) && (trim($rawData['photographe']) != '')) {
            $data['photographe'] = $rawData['photographe'];
        } else {
            $data['photographe'] = 'Inconnu';
        }

        if (isset($rawData['droits']) && (trim($rawData['droits']) != '')) {
            $data['droits'] = $rawData['droits'];
        } else {
            $data['droits'] = 'Domain Public';
        }

        if (isset($rawData['dateCrea'])) {
            $data['dateCrea'] = $rawData['dateCrea'];
        } else {
            $data['dateCrea'] = date("d-m-Y H:i:s");
        }

        return new self($data);
    }
    /**
    * Méthode pour signaler les donnée à modifiquer.
    * 
    *@param [array] $data Ensemble de données de l'article
    *
    * @return [empty] 
    */
    public function modifier($data)
    {
        if (isset($data['chemin'])) {
            $this->setChemin($data['chemin']);
        }
        if (isset($data['thumb'])) {
            $this->setThumb($data['thumb']);
        }
        if (isset($data['medium'])) {
            $this->setMedium($data['medium']);
        }
        if (isset($data['titre'])) {
            $this->setTitre($data['titre']);
        }
        if (isset($data['photographe'])) {
            $this->setPhotographe($data['photographe']);
        }
        if (isset($data['droits'])) {
            $this->setDroits($data['droits']);
        }
        if (isset($data['idArticle'])) {
            $this->setIdArticle($data['idArticle']);
        }
    }
    
    /*public function getId()
    {
        return $this->_id;
    }*/
    
    public function getIdArticle()
    {
        return $this->idArticle;
    }
    
    public function getChemin()
    {
        return $this->chemin;
    }

    public function getThumb()
    {
        return $this->thumb;
    }
    public function getMedium()
    {
        return $this->medium;
    }
   
    public function getTitre()
    {
        return $this->titre;
    }
    
    public function getPhotographe()
    {
        return $this->photographe;
    }
    
    public function getDroits()
    {
        return $this->droits;
    }
   
    /*public function getDateCrea()
    {
        return $this->_dateCrea;
    }*/
    /**
    * Setteur pour modifier la valeur du titre
    * 
    * @param [string] $titre valeur à modifier
    */
    public function setTitre($titre)
    {
        return $this->titre = $titre;
    }
    public function setPhotographe($photographe)
    {
        return $this->photographe = $photographe;
    }
    public function setDroits($droits)
    {
        return $this->droits = $droits;
    }
    public function setIdArticle($idArticle)
    {
        return $this->idArticle = $idArticle;
    }
    /**
     * Setteur pour modifier le chemin
     *  
     * @param [string] $chemin valeur a modifier
     */
    public function setChemin($chemin)
    {
        $this->chemin = $chemin;
    }

    public function setThumb($thumb)
    {
        $this->thumb = $thumb;
    }
    public function setMedium($medium)
    {
        $this->medium = $medium;
    }
}
