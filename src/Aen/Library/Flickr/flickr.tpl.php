<?php
$imageFlickr= "";
foreach ($images as $photo) {
        $imageFlickr .='<li><div class="photo">' .
            '<a href="https://www.flickr.com/photos/' .$photo["owner"]. '/' .$photo["id"]. '" target="_blank"><figure><img src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '_t.jpg"></figure></a>'.
            '</div></li>';
}

if(empty($imageFlickr))
 $imageFlickr= "No image found on flickr.";
 
?>
<h2>Related images on Flickr</h2>
<div class="row break-480px text-center">
 <ul class="row row-masonry simple-gallery pop-gallery">

  <?= $imageFlickr;?>
 </ul>
</div>