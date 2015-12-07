<?php

namespace Aen\Document;

use Aen\Utils\Bd\Bd;
use Aen\ExifGallery\Article\Article;
use Aen\Document\Document;

abstract class DocumentBd implements DocumentBdInterface
{
    public static function enregistrer($document)
    {
        //var_dump($document);
        $bd = Bd::getInstance()->getConnexion();
        $sql = static::getRequete();
        //var_dump($sql);
        $res = $bd->prepare($sql);
        $data = static::getData($res, $document);
        //var_dump($data);
        return $res->execute($data);

    }
    public static function modifier($document)
    {
        $bd = Bd::getInstance()->getConnexion();
        $sql = static::getRequeteModif();
        $res = $bd->prepare($sql);
        $data = array('id' => $document->getId());
        $data += static::getData($res, $document);
        return $res->execute($data);
    }
    public static function supprimer($id)
    {
        $bd = Bd::getInstance()->getConnexion();
        $sql = static::getRequeteSuppr();
        $res = $bd->prepare($sql);
        $data = static::getDataId($res, $id);
        return $res->execute($data);
    }
    
    /**
    * Methode pour obtenir toutes les inforations d'un articles selectionné 
    * en rapport à son id
    *
    *@param [string] $id de l'article
    *
    * @return tableau avec les différents champs de l'article selectionné 
    */
    public static function lire($id)
    {
        $bd = Bd::getInstance()->getConnexion();
        $sql = "SELECT * FROM " . static::TABLE_NAME . " where id = :id";
        $res = $bd->prepare($sql);
        $data = static::getDataId($res, $id);
        $res->execute($data);
        $class = static::NS_NAME . '\\' . static::CLASS_NAME;
        while (($ligne = $res->fetch()) !== false) {
            $document = $class::initialize($ligne);
        }
        return $document;
    }

    /**
    * Methode pour obtenir la liste des articles
    *
    * @return tableau avec les différents champs d'un article 
    */
    public static function liste()
    {
        $bd = Bd::getInstance()->getConnexion();
        $sql = "SELECT * FROM " . static::TABLE_NAME . " ORDER BY dateCrea DESC";
        $res = $bd->query($sql);
        $class = static::NS_NAME . '\\' . static::CLASS_NAME;
        while (($ligne = $res->fetch()) !== false) {
            $document[] = $class::initialize($ligne);
        }
        return $document;
    }


    public static function getRequeteSuppr()
    {
        $sql = "DELETE FROM " . static::TABLE_NAME . " WHERE id = :id";
        return $sql;
    }

    public static function getDataId($res, $id)
    {
        $data = array('id' => $id);
        return $data;
    }
}
