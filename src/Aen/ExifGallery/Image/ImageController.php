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
        $this->output = '<section class="feature-section">
        <div class="container">
        <ul class="row row-masonry simple-gallery photo-grid">
        <li class="grid-sizer"></li>
        <li class="gutter-sizer"></li>';
        $imgTweet = "";
        if (!empty($list)) {
            foreach ($list as $image) {
                $show = new ImageHtml($image);
                $this->output .= $show->render('imageForHomeGallery.tpl.php');
                $imgTweet .= '<meta name="twitter:'.json_decode($image, true)['name'].'" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/'.json_decode($image, true)['url'].'">';
            }
        } else {
            $this->output .= "No available images.";
        }
        $this->output .= '</ul>
                </div>
            </div>
        </section>';
        $this->OGMeta ='<meta property="og:title" content="Exif Gallery" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery" />
        <meta property="og:image" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery'.json_decode($list[0], true)['url'].'" />';
        $this->tweetCards = '<meta name="twitter:card" content="gallery" />
        <meta name="twitter:site" content="@Snuchycovich" />
        <meta name="twitter:creator" content="@Snuchycovich" />
        <meta name="twitter:title" content="Exif Gallery">
        <meta name="twitter:description" content="Our gallery of images">
        <meta name="twitter:url" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/" />'
        .$imgTweet;
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
        //var_dump($image[0]['File']);
        $this->OGMeta ='<meta property="og:title" content="'.$title.'" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery" />
        <meta property="og:image" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/uploads/'.$file.'" />
        <meta property="og:image:secure_url" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/uploads/'.$file.'" />
        <meta property="og:image:type" content="'.$image[0]['File']['MIMEType'].'" />
        <meta property="og:image:width" content="'.$image[0]['File']['ImageWidth'].'" />
        <meta property="og:image:height" content="'.$image[0]['File']['ImageHeight'].'" />';
        $this->tweetCards = '<meta name="twitter:card" content="photo" />
        <meta name="twitter:site" content="@Snuchycovich" />
        <meta name="twitter:title" content="'.$title.'" />
        <meta name="twitter:image" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/uploads/'.$file.'" />
        <meta name="twitter:url" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/index.php?t=image&a=view&name='.$name.'/" />';
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
        var_dump(file_exists(DATA_PATH.'xmp/'.$fileName));$this->output .= '</ul>
                </div>
            </div>
        </section>';
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
        $this->output = file_get_contents(__DIR__.'/templates/map.php');
        $this->OGMeta ='<meta property="og:title" content="Exif Gallery World Map" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/index.php?t=image&a=map" />
        <meta property="og:image" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery'.json_decode($list[0], true)['url'].'" />';
        $this->tweetCards = '<meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/" />
        <meta name="twitter:title" content="Exif Gallery World Map" />
        <meta name="twitter:description" content="Our set of images and location in the world map" />
        <meta name="twitter:image" content="https://dev-21007640.users.info.unicaen.fr/ExifGallery/'.json_decode($list[0], true)['url'].'" />';
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
        $this->output = '<section class="feature-section make-page-height">
        <div class="container vertical-align-middle">';
        $this->output .= $form->renderForm('imageForm.tpl.php', $action);
        $this->output .= '</div></section>';
        $this->response->setPart('OGMeta', $this->OGMeta);
        $this->response->setPart('tweetCards', $this->tweetCards);
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    public function save()
    {
        $name = $this->request->getGetParam('name');
        $metadatas = ImageJson::readImage($name);
        $data = array(array("SourceFile" => "uploads/".basename($metadatas[0]["SourceFile"]),
            //XMP
            "XMP:Creator" => $_POST["xmp-creator"],
            "XMP:Title" => $_POST['xmp-title'],
            "XMP:Description" => $_POST['xmp-desc'],
            "XMP:Rights" => $_POST["xmp-rights"],
            "XMP:CreateDate" => $_POST["xmp-date"],
            "XMP:Subject" => explode(", ", $_POST["xmp-keywords"]),
            "XMP:State" => $_POST["xmp-state"],
            "XMP:City" => $_POST["xmp-city"],
            "XMP:Country" => $_POST["xmp-country"],
            //IPTC
            "IPTC:By-line" => $_POST["iptc-creator"],
            "IPTC:Headline" => $_POST['iptc-title'],
            "IPTC:Caption-Abstract" => $_POST['iptc-desc'],
            "IPTC:CopyrightNotice" => $_POST["iptc-rights"],
            "IPTC:DateCreated" => $_POST["iptc-date"],
            "IPTC:Keywords" => explode(", ", $_POST["iptc-keywords"]),
            "IPTC:Province-State" => $_POST["iptc-state"],
            "IPTC:City" => $_POST["iptc-city"],
            "IPTC:Country-PrimaryLocationName" => $_POST["iptc-country"],
            //EXIF
            "EXIF:Artist" => $_POST["exif-creator"],
            "EXIF:ImageDescription " => $_POST['exif-desc'],
            "EXIF:Copyright " => $_POST["exif-rights"],
            "EXIF:CreateDate " => $_POST["exif-date"]
        ));
        file_put_contents('./data/tmp.json', json_encode($data));
        $exiftool = new ExifTool("./uploads/");
        $exiftool->setMetadata(basename($metadatas[0]["SourceFile"]), "./data/tmp.json");
        $metas=$exiftool->getMetadata(basename($metadatas[0]["SourceFile"]));
        $model = new FileModel($name.".json", "./data/");
        $model->saveToFile($metas);
        $exiftool->getXMPdata(basename($metas[0]["SourceFile"]),"data/xmp/".$name . ".xmp");
        //change image list file
        $images=ImageJson::readList();
        foreach ($images as $key => $image) {
            $image=json_decode($image,true);
            if ($image["filename"] == $name) {
                $images[$key] = json_encode(array(
                    "name" => $_POST["xmp-title"],
                    'creator' => $_POST["xmp-creator"],
                    "filename" => $image["filename"],
                    "url" => $image["url"]
                ));
                break;
            }
        }
        file_put_contents("images.json",json_encode($images));
        header("Location: index.php?t=image&a=view&name=".$name);
        die();
    }



    public function delete()
    {
        $name = $this->request->getGetParam('name');
        $images=ImageJson::readList();
        foreach ($images as $key => $image) {
            $image=json_decode($image,true);
            if ($image["filename"] == $name) {
                unset($images[$key]);
                break;
            }
        }
        if(isset($images) && !empty($images)){
            file_put_contents("images.json",json_encode(array_values($images)));
        }else{
            file_put_contents("images.json",null);
        }
        unlink($image["url"]);
        unlink("data/".$name.".json");
        unlink("data/xmp/".$name.".xmp");
        header("Location: index.php");
        die();
    }

    
    
            
    public function enregistrerImage()
    {
        $tmp_name = !empty($_FILES["image"]["tmp_name"])?$_FILES["image"]["tmp_name"]:'';
        $nettoyeur = ImageForm::strategieNettoyage();
        $data = $nettoyeur->nettoyer($_POST);
        //var_dump($data);
        //try {
        $fileUrl = UploadManager::upload($data, $_FILES['image']);
        $thumb = UploadManager::thumbImage($fileUrl, 100, 100);
        $medium = UploadManager::mediumResize($fileUrl, 418, 0);
        if (empty($image)) {
            $image = Image::initialize();
            $image->modifier($_POST);
            $image->setChemin($fileUrl);
            $image->setThumb($thumb);
            $image->setMedium($medium);
        }
        //var_dump($image);
        //} catch (UploadException $e) {
           // die($e->getMessage());
        //}
        $form = new ImageForm($image);
        if ($form->valider()) {
            $save = ImageBd::enregistrer($image);
            if ($save) {
                $this->title = "Image enregistré";
                $this->output = "L'image a été bien enregistré";
            } else {
                echo $oldImage->getChemin();
                unlink($oldImage->getChemin());
                unlink($oldImage->getThumb());
                unlink($oldImage->getMedium());
            }
        } else {
            $action = "index.php?t=image&amp;a=enregistrerImage";
            $this->title = "Complétez le formulaire";
            $this->output = $form->afficherForm('formImage.tpl.php', $action);
            unlink($image->getChemin());
            unlink($image->getThumb());
            unlink($image->getMedium());
        }
        $this->response->setPart('output', $this->output);
        $this->response->setPart('title', $this->title);
    }
    public function trouverImage()
    {
        try {
            AccessControl::verifierStatut(array('Admin', 'Rédacteur'));
            $this->title = "Cherhcher une image pour l'Article :<br>";
            $id = (int) $this->request->getGetParam('idArticle');
            $article = ArticleBd::lire($id);
            $this->title .= "<span>{$article->getTitre()}</span>";
            $idArticle = (int) $this->request->getGetParam('idArticle');
            $image = Image::initialize(array('idArticle' => $idArticle));
            $action = "index.php?t=image&amp;a=enregistrerImageFlickr";
            $form = new ImageForm($image);
            $this->output .= $form->afficherForm('flickrForm.tpl.php', $action);
        } catch (AccessException $e) {
            $this->title = "Accès refusé";
            $this->output .= $e->getMessage();
        }
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }
    public function enregistrerImageFlickr()
    {
        try {
            AccessControl::verifierStatut(array('Admin', 'Rédacteur'));
            $data = $_POST;
            $img = UploadManager::downloadFlickr($data);
            $thumb = UploadManager::thumbImage($img['chemin'], 100, 100);
            $medium = UploadManager::mediumResize($img['chemin'], 418, 0);
            $image = Image::initialize($img);
            $image->modifier($data);
            $image->setChemin($img['chemin']);
            $image->setThumb($thumb);
            $image->setMedium($medium);
            ImageBd::enregistrer($image) or die ("Pb d'enregistrement en BD");
            $id = (int) $this->request->getPostParam('idArticle');
            $article = ArticleBd::lire($id);
            $articleoutput = new Articleoutput($article);
            $this->output .= $articleoutput->afficher('afficher.tpl.php');
            $images = ImageBd::listeImages($id);
            $this->output .= "<div class=\"images-container\">";
            foreach ($images as $image) {
                $item = new Imageoutput($image);
                $this->output .= $item->afficher('afficherImage.tpl.php');
            }
            $this->output .= "</div>";
            $this->title = 'Image enregistré';
        } catch (AccessException $e) {
            $this->title = "Accès refusé";
            $this->output .= $e->getMessage();
        }
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);

    }


    public function modifImage()
    {
        try {
            AccessControl::verifierStatut(array('Admin', 'Rédacteur'));
            $this->title = "Modifier image";
            $action = "index.php?t=image&amp;a=modifEnregImage";
            $id = (int) $_GET['id'];
            $image = ImageBd::lire($id);
            //var_dump($image);
            $form = new ImageForm($image);
            $this->output = $form->afficherForm('formImage.tpl.php', $action);
        } catch (AccessException $e) {
            $this->title = "Accès refusé";
            $this->output .= $e->getMessage();
        }
        $this->response->setPart('output', $this->output);
        $this->response->setPart('title', $this->title);
    }
    public function modifEnregImage()
    {
        try {
            AccessControl::verifierStatut(array('Admin', 'Rédacteur'));
            $this->title = "Image modifiée";
            $action = "index.php?t=image&amp;a=modifEnregImage";
            $nettoyeur = ImageForm::strategieNettoyage();
            $data = $nettoyeur->nettoyer($_POST);
            $oldImage = ImageBd::lire($data['id']);
            $oldImage->modifier($data);
            //var_dump($_FILES['image']['error']);
            if (!($_FILES['image']['error']) == '4') {
                if (file_exists($oldImage->getChemin())) {
                    unlink($oldImage->getChemin());
                }
                if (file_exists($oldImage->getThumb())) {
                     unlink($oldImage->getThumb());
                }
                if (file_exists($oldImage->getMedium())) {
                    unlink($oldImage->getMedium());
                }
                $fileUrl = UploadManager::upload($data, $_FILES['image'], $oldImage);
                $thumb = UploadManager::thumbImage($fileUrl, 100, 100);
                $medium = UploadManager::mediumResize($fileUrl, 250, 0);
                $oldImage->setChemin($fileUrl);
                $oldImage->setThumb($thumb);
                $oldImage->setMedium($medium);
            }
            $form = new ImageForm($oldImage);
            if ($form->valider()) {
                ImageBd::modifier($oldImage);
                $this->title = "Image enregistré";
                $this->output = "L'image a été bien enregistré";
            } else {
                $this->title = "Erreur complétez le formulaire";
                $this->output = $form->afficherForm('formImage.tpl.php', $action);
                if (!($_FILES['image']['error']) == '4') {
                    unlink($oldImage->getChemin());
                    unlink($oldImage->getThumb());
                    unlink($oldImage->getMedium());
                }
            }
        } catch (AccessException $e) {
            $this->title = "Accès refusé";
            $this->output .= $e->getMessage();
        }
        $this->response->setPart('output', $this->output);
        $this->response->setPart('title', $this->title);
    }
    public function supprimerImage()
    {
        try {
            AccessControl::verifierStatut(array('Admin', 'Rédacteur'));
            $this->title = "Supprimer image";
            $action = "index.php?t=image&amp;a=supprEnregImage";
            $this->output = "Vous-etes sûr de vouloir supprimer cette image?";
            $id = (int) $_GET['id'];
            $image = ImageBd::lire($id);
            $afficher = new Imageoutput($image);
            $this->output .= $afficher->afficher('justeImage.tpl.php');
            $form = new ImageForm($image);
            $this->output .= $form->afficherForm('formSupprImg.tpl.php', $action);
        } catch (AccessException $e) {
            $this->title = "Accès refusé";
            $this->output .= $e->getMessage();
        }
        $this->response->setPart('output', $this->output);
        $this->response->setPart('title', $this->title);
    }
    public function supprEnregImage()
    {
        try {
            AccessControl::verifierStatut(array('Admin', 'Rédacteur'));
            $this->title = "Image supprimé";
            $id = (int) $_POST['id'];
            if (isset($id)) {
                $image = ImageBd::lire($id);
                //var_dump($image);
                if (file_exists($image->getChemin())) {
                    unlink($image->getChemin());
                    unlink($image->getThumb());
                    unlink($image->getMedium());
                }
                ImageBd::supprimer($id);
                
                $this->output = "<button type=\"submit\" onclick=\"history.go(-2)\">Retour</button>";
            } else {
                $title = "Imposible de supprimer l'image";
            }
        } catch (AccessException $e) {
            $this->title = "Accès refusé";
            $this->output .= $e->getMessage();
        }
        $this->response->setPart('output', $this->output);
        $this->response->setPart('title', $this->title);
    }
}
