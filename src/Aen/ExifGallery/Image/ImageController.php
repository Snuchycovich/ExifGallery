<?php

namespace Aen\ExifGallery\Image;

use Aen\ExifGallery\Image\Image;
use Aen\ExifGallery\Image\ImageJson;
use Aen\ExifGallery\Image\ImageDownload;
use Aen\ExifGallery\Image\ImageForm;
use Aen\ExifGallery\Image\ImageHtml;

use Aen\Document\DocumentController;

use Aen\Utils\UploadManager\UploadManager;
use Aen\Utils\UploadManager\UploadException;
use Aen\Utils\RenderTemplate\RenderTemplate;

class ImageController extends DocumentController
{
    
    public function home()
    {
        $this->title = "Exiftool Gallery";
        $list = ImageJson::readList();
        $this->output = '<section class="feature-section">
        <div class="container">
        <ul class="row row-masonry simple-gallery pop-gallery">
        <li class="grid-sizer"></li>
        <li class="gutter-sizer"></li>';
        if (!empty($list)) {
            foreach ($list as $image) {
                $show = new ImageHtml($image);
                $this->output .= $show->render('imageForHomeGallery.tpl.php');
            }
        } else {
            $this->output .= "Pas d'images par le moment.";
        }
        $this->output .= '</ul>
                </div>
            </div>
        </section>';
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    public function gallery()
    {
        $this->title = "Image List";
        $list = ImageJson::readList();
        $this->output = '<section class="feature-section make-page-height">
        <div class="container vertical-align-middle">
        <div class="row break-480px center-block">
        <ul class="row row-masonry simple-gallery pop-gallery photo-grid">';
        if (!empty($list)) {
            foreach ($list as $image) {
                $show = new ImageHtml($image);
                $this->output .= $show->render('imageForGallery.tpl.php');
            }
        } else {
            $this->output .= "Pas d'images par le moment.";
        }
        $this->output .= '</ul>
                </div>
            </div>
        </section>';
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
        $this->title = $image[0]['XMP']['Title'];
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }
    public function downloadImage()
    {
        $image = $this->request->getGetParam('name');
        ImageDownload::download($image, IMAGE_PATH, 'image/' . pathinfo($image, PATHINFO_EXTENSION));
    }
    public function downloadXmp()
    {
        $image = $this->request->getGetParam('name');
        $fileName = basename($image, pathinfo($image, PATHINFO_EXTENSION))."xmp";
        ImageDownload::download($fileName, DATA_PATH.'xmp/', 'text/xml');
        var_dump(file_exists(DATA_PATH.'xmp/'.$fileName));
        $this->title = $fileName;
        $this->response->setPart('title', $this->title);
        
    }

    public function upload()
    {
        $this->title = "New Image";
        $this->output = file_get_contents(__DIR__.'/templates/uploadImage.php');
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }
    public function add()
    {
        $this->title = "Upload Image";
        $this->output = file_get_contents(__DIR__.'/templates/uploadImage.php');
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    public function map()
    {
        $this->title = "Images Map";
        
        $this->output = file_get_contents(__DIR__.'/templates/map.php');
        //$this->output = $show->afficher('liste.tpl.php');
        
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    public function modify()
    {
        $this->title = "Modify image";
        $this->output = "modif";
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }

    public function liste()
    {
        $this->title = "Liste d'image";
        $liste = ImageBd::ttImages();
        $this->output .= "<div class=\"liste-images\">";
        if (!empty($liste)) {
            foreach ($liste as $ligne) {
                $afficher = new Imageoutput($ligne);
                $this->output.=$afficher->afficher('affichierPourListe.tpl.php');
            }
        } else {
            $this->output = "<p class=\"message\">Il n'y a pas d'image</p>";
        }
        $this->output .= "</div>";
        $this->response->setPart('title', $this->title);
        $this->response->setPart('output', $this->output);
    }
    public function ajouterImage()
    {
        try {
            AccessControl::verifierStatut(array('Admin', 'Rédacteur'));
            $this->title = "Ajouter une image";
            $action = "index.php?t=image&amp;a=enregistrerImage";
            $id = (int) $_GET['idArticle'];
            $image = Image::initialize(array('idArticle' => $id));
            $form = new ImageForm($image);
            $this->output = $form->afficherForm('formImage.tpl.php', $action);
            //var_dump($id);
        } catch (AccessException $e) {
            $this->title = "Accès refusé";
            $this->output .= $e->getMessage();
        }
        $this->response->setPart('output', $this->output);
        $this->response->setPart('title', $this->title);
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
