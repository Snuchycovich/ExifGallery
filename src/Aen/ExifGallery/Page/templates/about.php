<div class="row about-page">

    <div class="desc">
        <span class="title">‘Exif Gallery’</span> est une application web permettant de créer une galerie de photos et
        de manipuler leurs métadonnées. Le projet utilise ces métadonnées pour remplir
        certaines informations tels que le titre, le créateur, la date de création et la
        description.
    </div>

    <div class="col-lg-12">
        <p class="page-header">Notre équipe</p>
    </div>


    
    <div class="col-sm-4">
        <img class="img-circle img-responsive img-center" src="ui/images/emi.jpg" alt="Emiliano Castillo">
        <h3 class="member">Emiliano CASTILLO</h3>
        <small>21007640</small>
        <!-- <p>What does this team member to? Keep it short! This is also a great spot for social links!</p> -->
    </div>
    <div class="col-sm-4">
        <img class="img-circle img-responsive img-center" src="ui/images/amani.png" alt="Amani Lahbib">
        <h3 class="member">Amani LAHBIB</h3>
        <small>21510664</small>
    </div>
    <div class="col-sm-4">
        <img class="img-circle img-responsive img-center" src="ui/images/nick.jpg" alt="Mykyta Kharaim">
        <h3 class="member">Nikita KHARAIM</h3>
        <small>21408279</small>
    </div>
</div>
<div class="row about-page">
    <div class="col-lg-12">
        <h2 class="page-header">Techniques utilisées</h2>
    </div>
    <!--Description -->
    <div class="col-md-12">
        <p>Dans la page principale, nous trouvons la galerie de toutes les photos sauvegardées 
            sur le serveur. En cliquant sur l’une des photos, nous accédons à sa page de 
            détails affichant ses informations et ses métadonnées. Cette page donne accès à la 
            page de modification des métadonnées de l’image et permet de télécharger ou 
            supprimer la photo ainsi que de télécharger son fichier xmp Sidecar. Nous trouvons 
            aussi un champ de recherche sur Flickr des images en rapport avec l’image affichée 
            via des tags. <br>Enfin, la page « Map » affiche les images avec des données de latitude et longitude
            dans une carte du monde. </p>    
    </div>
    
    <div class="col-sm-4">
        <img class="technique-img" src="ui/images/bootstrap-logo.png" alt="Bootstrap">
        <p>Initialement, nous avons utilisé le thème Bootstrap “swirly-love” visualisant 
            tout le contenu dans une seule page (index) avec des appels ajax pour charger les 
            différentes pages des images. Nous avons été confrontés à des difficultés technique 
            pour la génération des métadonnées : Open Graph et Twitter Cards de chaque image 
            donc nous avons restructure le thème en gardant quelques éléments.</p>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-4">
        <img class="technique-img" src="ui/images/php-elephant.png" alt="php framework">
        <p>Ce projet a été l’occasion pour Amani d'avoir une approche aux notions "Objet"
            de PHP. Nous avons en partie utilisé l'architecture MVC réalisé l'année dernière 
            lors du cours PHP avance.</p>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-4">
        <img class="technique-img" src="ui/images/file_upload.png" alt="Gestion des fichiers">
        <p>Comme spécifié dans le sujet du devoir, nous n'avons pas utilisé une base de données. 
            Au moment de l'Upload d'une image, un fichier JSON avec ses métadonnées ainsi que le 
            fichier xmp sidecar sont créés comportant le même nom que l’image. De plus, le projet 
            compte sur un fichier placé à la racine appelé « image.json » qui sert comme index pour 
            la gestion des images ; nous y ajoutons les informations nécessaires de l'image 
            fraîchement chargée pour avoir une référence sur elle et ne pas être obligé à charger 
            tous les fichiers json des métadonnées.</p>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-4">
        <img class="technique-img" src="ui/images/leaflet.png" alt="Leaflet">
        <p>La librairie <a href="http://leafletjs.com/">Leaflet</a> de JavaScript a été créé par <a href="https://www.mapbox.com/">Mapbox</a> et utilisée pour afficher la carte de
            FlickrMap.
            Elle nous a permis l'affichage d'une carte dynamique avec des marqueurs positionés selon les coordonnées gps des images
            passés. <p>
        <p>Pour ce faire, nous avons implémenté une fonction en jQuery pour convertir les données latitude et
            longitude en format Degree – Minute – seconds trouvés dans les metadata EXIF des images 
            en coordonées GPS pour les passer à leaflet.</p>
        <p>Nous avons, ensuite, utilisé un effet lightbox pour afficher les images en grande.</p>
    <!-- /.col-sm-4 -->
    </div>
    <div class="col-sm-4">
        <img class="technique-img" src="ui/images/logo-flickr.jpg" alt="Flickr">
        <p>L’API de <a href="https://www.flickr.com/services/api/">Flickr</a> fournit un nombre de méthodes pour rechercher des images,
            contacts, notes et commentaires.</p>
        <p>Nous avons utilisé la méthode ‘flickr.photos.search’ pour rechercher des 
            images en utilisant PHP. Pour ce faire, nous avons, tout d'abord, obtenu un 
            api_key en se rendant au site « <a href="http://www.flickr.com/services/apps/create/">
            http://www.flickr.com/services/apps/create/</a> » 
            utile pour emmètre nos requêtes au flickr api.</p>
        <p>En effet, nous envoyons une requête REST en spécifiant le format de retour 
            ‘php_serial’, le nombre d’images souhaitées, notre api key ainsi que le texte 
            de la recherche.</p>

    <!-- /.col-sm-4 -->
    </div>
    <div class="col-sm-4">
        <img class="technique-img" src="ui/images/upload.png" alt="File Upload">
        <p>Le plugin <a href="http://plugins.krajee.com/file-input">'Bootstrap File Input'</a> est une amélioration
            du 'file input' de HTML 5 offrant un contrôle de sélecteur
            de fichiers / upload de pointe conçu pour fonctionner spécialement avec des styles Bootstrap CSS3 pour Bootstrap 3.x.
            </p>
        <p>Il nous a permis d'améliorer la fonctionnalité de l'upload de fichiers, en offrant un soutien pour
            la prévisualisation des images, glisser-déposer des fichiers, visualisation de la
            progression du téléchargement et l'ajout ou la suppression de fichiers.</p>

    <!-- /.col-sm-4 -->
    </div>
</div>