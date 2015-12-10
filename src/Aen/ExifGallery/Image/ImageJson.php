<?php

namespace Aen\ExifGallery\Image;

class ImageJSON
{

    public static function readList()
    {
        $images = json_decode(trim(file_get_contents("images.json")), true);
        return $images;
    }

    public static function readImage($nom)
    {
        $image = json_decode(trim(file_get_contents("./data/".$nom.".json")), true);
        return $image;
    }
    public static function readImageModifMeta($nom)
    {
        
        $image = json_decode(trim(file_get_contents("./data/".$nom.".json")), true);
        $meta = array();
        if (isset($image[0])) {
            // IPTC
            if (!isset($image[0]['IPTC']['By-line'])) {
                $image[0]['IPTC']['By-line'] = "";
            }
            if (!isset($image[0]['IPTC']['Headline'])) {
                $image[0]['IPTC']['Headline'] = "";
            }
            if (!isset($image[0]['IPTC']['Caption-Abstract'])) {
                $image[0]['IPTC']['Caption-Abstract'] = "";
            }
            if (!isset($image[0]['IPTC']['CopyrightNotice'])) {
                $image[0]['IPTC']['CopyrightNotice'] = "";
            }
            if (!isset($image[0]['IPTC']['DateCreated'])) {
                $image[0]['IPTC']['DateCreated'] = "";
            }
            if (!isset($image[0]['IPTC']['Keywords'])) {
                $image[0]['IPTC']['Keywords'] = array();
            }
            if (!isset($image[0]['IPTC']['Province-State'])) {
                $image[0]['IPTC']['Province-State'] = "";
            }
            if (!isset($image[0]['IPTC']['Country-PrimaryLocationName'])) {
                $image[0]['IPTC']['Country-PrimaryLocationName'] = "";
            }
            if (!isset($image[0]['IPTC']['City'])) {
                $image[0]['IPTC']['City'] = "";
            }
            //EXIF
            if (!isset($image[0]['EXIF']['Artist'])) {
                $image[0]['EXIF']['Artist'] = "";
            }
            if (!isset($image[0]['EXIF']['ImageDescription'])) {
                $image[0]['EXIF']['ImageDescription'] = "";
            }
            if (!isset($image[0]['EXIF']['Copyright'])) {
                $image[0]['EXIF']['Copyright'] = "";
            }
            if (!isset($image[0]['EXIF']['CreateDate'])) {
                $image[0]['EXIF']['CreateDate'] = "";
            }

            //XMP
            if (!isset($image[0]['XMP']['Creator'])) {
                $image[0]['XMP']['Creator'] = "";
            }
            if (!isset($image[0]['XMP']['Title'])) {
                $image[0]['XMP']['Title'] = "";
            }
            if (!isset($image[0]['XMP']['Description'])) {
                $image[0]['XMP']['Description'] = "";
            }
            if (!isset($image[0]['XMP']['Rights'])) {
                $image[0]['XMP']['Rights'] = "";
            }
            if (!isset($image[0]['XMP']['DateCreated'])) {
                $image[0]['XMP']['DateCreated'] = "";
            }
            if (!isset($image[0]['XMP']['Subject'])) {
                $image[0]['XMP']['Subject'] = array();
            }
            if (!isset($image[0]['XMP']['State'])) {
                $image[0]['XMP']['State'] = "";
            }
            if (!isset($image[0]['XMP']['Country'])) {
                $image[0]['XMP']['Country'] = "";
            }
            if (!isset($image[0]['XMP']['City'])) {
                $image[0]['XMP']['City'] = "";
            }
            $meta = array("IPTC" => $image[0]['IPTC'],"EXIF"=>$image[0]['EXIF'],"XMP"=>$image[0]['XMP']);
        }
        return $meta;
    }
}
