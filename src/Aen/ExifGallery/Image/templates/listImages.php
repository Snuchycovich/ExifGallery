<?php
$html =" ";
if ($images) {
    foreach ($images as $image) {
        $html .= '<li class="col-xs-10 col-md-8">' .
        '<a href="#"' .
        'data-slide="slide"' .
        'data-target="#details"'.
        'class="color-inherit-link"' .
        'role="button" aria-controls="#details"'.
        'aria-expanded="false">' .
        '<div class="center-block col-sm-12 clickedimage">
        <img id="'.json_decode($image, true)["filename"].'" style="width:400px;height:150px" src="' . json_decode($image, true)["url"] . '" alt=' . json_decode($image, true)["name"] . ' class="img-circle img-responsive">
        <figcaption><p>'.json_decode($image, true)["name"] .'<br>By '.json_decode($image, true)["creator"].'</p></figcaption>
         </div>' .
        '</a></li>';
    }
} else {
    $html = "No images uploaded";
}


?>

<section class="feature-section make-page-height feature-even" id="about">
    <div class="container vertical-align-middle">
        <h2 class="theme-title">About Images</h2>

        <div class="row break-480px center-block">
            <ul class="row row-masonry simple-gallery pop-gallery photo-grid">
                <?= $html;?>
            </ul>
        </div>
    </div>
</section>