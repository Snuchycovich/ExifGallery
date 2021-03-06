<?php

namespace Aen\ExifGallery\Image;

use Aen\ExifGallery\Image\Image;
use Aen\ExifGallery\Image\ImageJson;
use Aen\ExifGallery\Image\ImageDownload;
use Aen\ExifGallery\Image\ImageForm;
use Aen\ExifGallery\Image\ImageHtml;

use Aen\Document\DocumentController;
use Aen\Utils\RenderTemplate\RenderTemplate;

use Aen\Library\ExifTool\ExifTool;
use Aen\Library\ExifTool\FileModel;

class ImageController extends DocumentController
{
    
    public function home()
    {
        $this->title = "Exiftool Gallery";
        $list = ImageJson::readList();
        $this->output = '<ul class="row row-masonry simple-gallery photo-grid">
        <li class="grid-sizer"></li>
        <li class="gutter-sizer"></li>';
        $imgTweet = "";
        if (isset($list) && !empty($list)) {
            shuffle($list);
            foreach ($list as $image) {
                $show = new ImageHtml($image);
                $this->output .= $show->render('imageForHomeGallery.tpl.php');
                //$imgTweet .= '<meta name="twitter:'.json_decode($image, true)['name'].'" content="https://21007640.users.info.unicaen.fr/ExifGallery/'.json_decode($image, true)['url'].'">'."\n";
            }
        } else {
            $this->output .= "No available images.";
        }
        $this->output .= '</ul>';
        $this->OGMeta ='<meta property="og:title" content="Exif Gallery" />
        <meta property="og:type" content="website" />
        <meta property="og:description"  content="Our gallery of images." />
        <meta property="og:url" content="https://21007640.users.info.unicaen.fr/ExifGallery/index.php" />
        <meta property="og:image" content="https://21007640.users.info.unicaen.fr/ExifGallery/'.json_decode($list[0], true)['url'].'" />
        <meta property="og:image:secure_url" content="https://21007640.users.info.unicaen.fr/ExifGallery/'.json_decode($list[0], true)['url'].'" />';
        $this->tweetCards = '<meta name="twitter:card" content="gallery" />
        <meta name="twitter:site" content="@Snuchycovich" />
        <meta name="twitter:creator" content="@Snuchycovich" />
        <meta name="twitter:title" content="Exif Gallery">
        <meta name="twitter:description" content="Our gallery of images">
        <meta name="twitter:url" content="https://21007640.users.info.unicaen.fr/ExifGallery/" />'
        /*.$imgTweet*/;
        $this->response->setPart('OGMeta', $this->OGMeta);
        $this->response->setPart('tweetCards', $this->tweetCards);
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    /**
     * Show image page from Json files by "nom" param
     * @return page Image
     */
    public function view()
    {
        $name = $id = $this->request->getGetParam('name');
        $image = ImageJson::readImage($name);
        $show = new ImageHtml($image);
        $this->output = $show->render('image.tpl.php');
        if (isset($image[0]['XMP']) && isset($image[0]['XMP']['Title'])) {
            $this->title = $image[0]['XMP']['Title'];
            $title = $image[0]['XMP']['Title'];
        } elseif (isset($image[0]['IPTC']) && isset($image[0]['IPTC']['Headline'])) {
            $this->title = $image[0]['IPTC']['Headline'];
            $title = $image[0]['IPTC']['Headline'];
        } else {
            $this->title = "Unknown";
            $title = "Unknown";
        }
        $file = $image[0]['File']['FileName'];
        $this->OGMeta ='<meta property="og:title" content="'.$title.'" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://21007640.users.info.unicaen.fr/ExifGallery/index.php?t=image&a=view&name='.$name.'" />
        <meta property="og:image" content="https://21007640.users.info.unicaen.fr/ExifGallery/uploads/'.$file.'" />
        <meta property="og:image:secure_url" content="https://21007640.users.info.unicaen.fr/ExifGallery/uploads/'.$file.'" />
        <meta property="og:image:type" content="'.$image[0]['File']['MIMEType'].'" />
        <meta property="og:image:width" content="'.$image[0]['File']['ImageWidth'].'" />
        <meta property="og:image:height" content="'.$image[0]['File']['ImageHeight'].'" />';
        $this->tweetCards = '<meta name="twitter:card" content="photo" />
        <meta name="twitter:site" content="@Snuchycovich" />
        <meta name="twitter:title" content="'.$title.'" />
        <meta name="twitter:image" content="https://21007640.users.info.unicaen.fr/ExifGallery/uploads/'.$file.'" />
        <meta name="twitter:url" content="https://21007640.users.info.unicaen.fr/ExifGallery/index.php?t=image&a=view&name='.$name.'" />';
        $this->response->setPart('OGMeta', $this->OGMeta);
        $this->response->setPart('tweetCards', $this->tweetCards);
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }
    public function downloadImage()
    {
        $this->tweetCards = "";
        $this->OGMeta = '';
        $this->title = '';
        $this->output = '';
        $image = $this->request->getGetParam('name');
        ImageDownload::download($image, IMAGE_PATH, 'image/' . pathinfo($image, PATHINFO_EXTENSION));
        $this->response->setPart('OGMeta', $this->OGMeta);
        $this->response->setPart('tweetCards', $this->tweetCards);
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }
    public function downloadXmp()
    {
        $this->tweetCards = "";
        $this->OGMeta = '';
        $this->title = '';
        $this->output = '';
        $image = $this->request->getGetParam('name');
        $fileName = basename($image, pathinfo($image, PATHINFO_EXTENSION))."xmp";
        ImageDownload::download($fileName, DATA_PATH.'xmp/', 'text/xmp');
        var_dump(file_exists(DATA_PATH.'xmp/'.$fileName));
        $this->title = $fileName;
        $this->response->setPart('OGMeta', $this->OGMeta);
        $this->response->setPart('tweetCards', $this->tweetCards);
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
        
    }

    public function upload()
    {
        $this->title = "New Image";
        $this->OGMeta = '';
        $this->tweetCards = '';
        $this->output = file_get_contents(__DIR__.'/templates/uploadImage.php');
        $this->response->setPart('OGMeta', $this->OGMeta);
        $this->response->setPart('tweetCards', $this->tweetCards);
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    public function map()
    {
        $this->title = "Images Map";
        $list = ImageJson::readList();
        $this->output = '<div id="map"></div>';
        $this->OGMeta ='<meta property="og:title" content="Exif Gallery World Map" />
        <meta property="og:type" content="website"/>
        <meta property="og:description"  content="Our set of images and location in the world map." />
        <meta property="og:url" content="https://21007640.users.info.unicaen.fr/ExifGallery/index.php?t=image&a=map" />
        <meta property="og:image" content="https://21007640.users.info.unicaen.fr/ExifGallery/ui/images/New_OpenStreetMap_Map.png" />
        <meta property="og:image:secure_url" content="https://21007640.users.info.unicaen.fr/ExifGallery/ui/images/New_OpenStreetMap_Map.png" />';
        $this->tweetCards = '<meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="https://21007640.users.info.unicaen.fr/ExifGallery/" />
        <meta name="twitter:title" content="Exif Gallery World Map" />
        <meta name="twitter:description" content="Our set of images and location in the world map" />
        <meta name="twitter:image" content="https://21007640.users.info.unicaen.fr/ExifGallery/'.json_decode($list[0], true)['url'].'" />';
        $this->response->setPart('OGMeta', $this->OGMeta);
        $this->response->setPart('tweetCards', $this->tweetCards);
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    public function modify()
    {
        $this->title = "Metadata Modification";
        $this->tweetCards = "";
        $this->OGMeta = '';
        $name = $id = $this->request->getGetParam('name');
        $action = "index.php?t=image&a=save&name=".$name;
        $image = ImageJson::readImageModifMeta($name);
        //var_dump($image);
        $form = new ImageForm($image);
        $this->output = $form->renderForm('imageForm.tpl.php', $action);
        $this->response->setPart('OGMeta', $this->OGMeta);
        $this->response->setPart('tweetCards', $this->tweetCards);
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    public function save()
    {
        //var_dump($_POST);
        $name = $this->request->getGetParam('name');
        $metadatas = ImageJson::readImage($name)[0];
        $data = array(array("SourceFile" => "./uploads/".basename($metadatas["SourceFile"]),
            //XMP
            "XMP:Creator" => (isset($_POST["prop-creator"]) && !empty($_POST["prop-creator"]))?$_POST["prop-creator"]:((isset($metadatas["XMP"]["Creator"]))? $metadatas["XMP"]["Creator"]:""),
            "XMP:Title" => (isset($_POST["prop-title"]) && !empty($_POST["prop-title"]))?$_POST["prop-title"]: (isset($metadatas["XMP"]["Title"])? $metadatas["XMP"]["Title"]:""),
            "XMP:Description" => (isset($_POST["prop-desc"]) && !empty($_POST["prop-desc"]))?$_POST["prop-desc"]:(isset($metadatas["XMP"]["Description"])? $metadatas["XMP"]["Description"] : ""),
            "XMP:Rights" => (isset($_POST["prop-rights"]) && !empty($_POST["prop-rights"]))?$_POST["prop-rights"]:(isset($metadatas["XMP"]["Rights"])? $metadatas["XMP"]["Rights"] : ""),
            "XMP:CreateDate" => (isset($_POST["prop-y"]) && isset($_POST["prop-m"]) && isset($_POST["prop-d"]) && !empty($_POST["prop-y"]))? $_POST["prop-y"].":".$_POST["prop-m"].":".$_POST["prop-d"]:(isset($metadatas["XMP"]["CreateDate"])? $metadatas["XMP"]["CreateDate"] :""),
            "XMP:Subject" => (isset($_POST["prop-Keywords"]) && !empty($_POST["prop-Keywords"]))? explode(", ", $_POST["prop-Keywords"]):(isset($metadatas["XMP"]["Subject"])?$metadatas["XMP"]["Subject"]:array()),
            "XMP:State" => (isset($_POST["prop-state"]) && !empty($_POST["prop-state"]))?$_POST["prop-state"]:(isset($metadatas["XMP"]["State"])? $metadatas["XMP"]["State"] :""),
            "XMP:City" => (isset($_POST["prop-City"]) && !empty($_POST["prop-City"]))?$_POST["prop-City"]: (isset($metadatas["XMP"]["City"])?$metadatas["XMP"]["City"]:""),
            "XMP:Country" => (isset($_POST["prop-Country"]) && !empty($_POST["prop-Country"]))? $_POST["prop-Country"]: (isset($metadatas["XMP"]["Country"])?$metadatas["XMP"]["Country"]:""),
            
            //IPTC
            "IPTC:By-line" => (isset($_POST["prop-creator"]) && !empty($_POST["prop-creator"]))?$_POST["prop-creator"]:(isset($metadatas["IPTC"]["By-line"])?$metadatas["IPTC"]["By-line"]:""),
            "IPTC:Headline" => (isset($_POST["prop-title"]) && !empty($_POST["prop-title"]))?$_POST["prop-title"]:(isset($metadatas["IPTC"]["Headline"])?$metadatas["IPTC"]["Headline"]:""),
            "IPTC:Caption-Abstract" => (isset($_POST["prop-desc"]) && !empty($_POST["prop-desc"]))?$_POST["prop-desc"]:(isset($metadatas["IPTC"]["Caption-Abstract"])?$metadatas["IPTC"]["Caption-Abstract"]:""),
            "IPTC:CopyrightNotice" => (isset($_POST["prop-rights"]) && !empty($_POST["prop-rights"]))?$_POST["prop-rights"]:(isset($metadatas["IPTC"]["CopyrightNotice"])?$metadatas["IPTC"]["CopyrightNotice"]:""),
            "IPTC:DateCreated" => (isset($_POST["prop-y"]) && isset($_POST["prop-m"]) && isset($_POST["prop-d"]) && !empty($_POST["prop-y"]))? $_POST["prop-y"].":".$_POST["prop-m"].":".$_POST["prop-d"]:(isset($metadatas["IPTC"]["DateCreated"])?$metadatas["IPTC"]["DateCreated"]:""),
            "IPTC:Keywords" => (isset($_POST["prop-Keywords"]) && !empty($_POST["prop-Keywords"]))? explode(", ", $_POST["prop-Keywords"]): (isset($metadatas["IPTC"]["Keywords"])?$metadatas["IPTC"]["Keywords"]:array()),
            "IPTC:Province-State" => (isset($_POST["prop-state"]) && !empty($_POST["prop-state"]))?$_POST["prop-state"]:(isset($metadatas["IPTC"]["Province-State"])?$metadatas["IPTC"]["Province-State"]:""),
            "IPTC:City" => (isset($_POST["prop-City"]) && !empty($_POST["prop-City"]))?$_POST["prop-City"]: (isset($metadatas["IPTC"]["City"])? $metadatas["IPTC"]["City"]:""),
            "IPTC:Country-PrimaryLocationName" => (isset($_POST["prop-Country"]) && !empty($_POST["prop-Country"]))? $_POST["prop-Country"]: (isset($metadatas["IPTC"]["Country-PrimaryLocationName"])?$metadatas["IPTC"]["Country-PrimaryLocationName"]:""),
            //EXIF
            "EXIF:Artist" => $_POST["prop-creator"],(isset($_POST["prop-creator"]) && !empty($_POST["prop-creator"]))?$_POST["prop-creator"]:(isset($metadatas["EXIF"]["Artist"])?$metadatas["EXIF"]["Artist"]:""),
            "EXIF:ImageDescription " => (isset($_POST["prop-desc"]) && !empty($_POST["prop-desc"]))?$_POST["prop-desc"]:(isset($metadatas["EXIF"]["ImageDescription"])?$metadatas["EXIF"]["ImageDescription"]:""),
            "EXIF:Copyright " => (isset($_POST["prop-rights"]) && !empty($_POST["prop-rights"]))?$_POST["prop-rights"]:(isset($metadatas["EXIF"]["Copyright"])?$metadatas["EXIF"]["Copyright"]:''),
            "EXIF:CreateDate " => (isset($_POST["prop-y"]) && isset($_POST["prop-m"]) && isset($_POST["prop-d"]) && !empty($_POST["prop-y"]))? $_POST["prop-y"].":".$_POST["prop-m"].":".$_POST["prop-d"]:(isset($metadatas["EXIF"]["CreateDate"])?$metadatas["EXIF"]["CreateDate"]:"")
        ));
        file_put_contents('./data/tmp.json', json_encode($data));
        $exiftool = new ExifTool("./uploads/");
        $exiftool->setMetadata(basename($metadatas["SourceFile"]), "./data/tmp.json");
        $metas = $exiftool->getMetadata(basename($metadatas["SourceFile"]));
        $model = new FileModel($name.".json", "./data/");
        $model->saveToFile($metas);
        $exiftool->getXMPdata(basename($metas[0]["SourceFile"]), "data/xmp/".$name . ".xmp");
        //change image list file
        $images=ImageJson::readList();
        foreach ($images as $key => $image) {
            $image=json_decode($image, true);
            if ($image["filename"] == $name) {
                $images[$key] = json_encode(array(
                    "name" => (isset($_POST["prop-title"]) && !empty($_POST["prop-title"]))?$_POST["prop-title"]:$metadatas["XMP"]["Title"],
                    'creator' => (isset($_POST["prop-creator"]) && !empty($_POST["prop-creator"]))?$_POST["prop-creator"]:$metadatas["XMP"]["Creator"],
                    "filename" => $image["filename"],
                    "url" => $image["url"]
                ));
                break;
            }
        }
        file_put_contents("images.json", json_encode($images));
        header("Location: index.php?t=image&a=view&name=".$name);
        die();
    }



    public function delete()
    {
        $name = $this->request->getGetParam('name');
        $images = ImageJson::readList();
        foreach ($images as $key => $image) {
            $image = json_decode($image, true);
            if ($image["filename"] == $name) {
                unset($images[$key]);
                break;
            }
        }
        if (isset($images) && !empty($images)) {
            file_put_contents("images.json", json_encode(array_values($images)));
        } else {
            file_put_contents("images.json", null);
        }
        unlink($image["url"]);
        unlink("data/".$name.".json");
        unlink("data/xmp/".$name.".xmp");
        header("Location: index.php");
        die();
    }
}
