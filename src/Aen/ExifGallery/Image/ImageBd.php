<?php

namespace Ecl\Emdn2\Image;

use Ecl\Utils\Bd\Bd;
use Ecl\Emdn2;
use Ecl\Document\DocumentBd;
use Ecl\Emdn2\Image\Image;

class ImageBd extends DocumentBd
{
    const TABLE_NAME = "images";
    const NS_NAME = __NAMESPACE__;
    const CLASS_NAME = 'Image';

    public static function getRequete()
    {
        $sql = "INSERT INTO images SET titre = :titre, idArticle = :idArticle, chemin = :chemin,
        thumb = :thumb, medium = :medium, droits = :droits, photographe = :photographe, dateCrea = now()";
        return $sql;
    }

    public static function getData($res, $image)
    {
        $data = array(
            'titre' => $image->getTitre(),
            'idArticle' => $image->getIdArticle(),
            'chemin' => $image->getChemin(),
            'thumb' => $image->getThumb(),
            'medium' => $image->getMedium(),
            'photographe' => $image->getPhotographe(),
            'droits' => $image->getDroits()
            );
        return $data;
    }
    public static function listeImages($idArticle)
    {
        $bd = Bd::getInstance()->getConnexion();
        $sql = "SELECT * FROM " . static::TABLE_NAME . " where idArticle = :idArticle";
        $res = $bd->prepare($sql);
        $data = array('idArticle' => $idArticle);
        $res->execute($data);
        $tableau = array();
        while (($ligne = $res->fetch()) !== false) {
            $tableau[] = Image::initialize($ligne);
        }
        return $tableau;
    }
    public static function ttImages()
    {
        $bd = Bd::getInstance()->getConnexion();
        $sql = "SELECT * FROM images order by dateCrea";
        $res = $bd->query($sql);
        while (($ligne = $res->fetch()) !== false) {
            $image[] = Image::initialize($ligne);
        }
        if (isset($image)) {
            return $image;
        } else {
            $image = '';
            return $image;
        }
    }

    public static function getRequeteModif()
    {
        $sql = "UPDATE images SET idArticle = :idArticle, chemin = :chemin, thumb = :thumb, medium = :medium,
        titre = :titre, photographe = :photographe, droits = :droits WHERE id = :id";
        return $sql;
    }

    public static function supprimerImage()
    {
    }

    /*public static function getDataModif($res, $image)
    {
        $data = array(
            'idArticle' => $image->getIdArticle(),
            'chemin' => $image->getChemin(),
            'titre' => $image->getTitre(),
            'photographe' => $image->getPhotographe(),
            'droits' => $image->getDroits(),
            'id' => $image->getId()
            );
        return $data;
    }*/
}
