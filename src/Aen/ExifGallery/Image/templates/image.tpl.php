<?php

//info search
$creator = "Unknown creator";
$creatorUrl = "";
$description = "";

if (isset($this->image[0]["XMP"]["CreatorWorkURL"])) {
    $creatorUrl = $this->image[0]["XMP"]["CreatorWorkURL"];
}

if (isset($this->image[0]["XMP"]["Creator"])) {
    $creator = $this->image[0]["XMP"]["Creator"];
}else if (isset($this->image[0]["IPTC"]["By-line"])) {
        $creator = $this->image[0]["IPTC"]["By-line"];
}else if (isset($this->image[0]["EXIF"]["Artist"])) {
    $creator = $this->image[0]["EXIF"]["Artist"];
}
$creator = "<span itemprop=\"author\">$creator</span>";
if (empty($creatorUrl) || $creatorUrl == "") {
    $creator = "By " . $creator;
} else {
    $creator = "<a target='_blank' href=" . $creatorUrl . "> By " . $creator . "</a>";
}

if (isset($this->image[0]["IPTC"]["Caption-Abstract"])) {
    $description = '<blockquote><font size="2">' . $this->image[0]["IPTC"]["Caption-Abstract"] . '</font></blockquote>';
} elseif (isset($this->image[0]["XMP"]["Description"])) {
    $description = '<blockquote><font size="2">' . $this->image[0]["XMP"]["Description"] . '</font></blockquote>';
}

(isset($this->image[0]["IPTC"]["DateCreated"])) ? $date = $this->image[0]["IPTC"]["DateCreated"] :
    ((isset($this->image[0]["XMP"]["CreateDate"])) ? $date = $this->image[0]["XMP"]["CreateDate"] :
        ((isset($this->image[0]["EXIF"]["DateTimeOriginal"])) ? $date = $this->image[0]["EXIF"]["DateTimeOriginal"] : $date = null));
if (isset($date)) {
    $list = explode(":", explode(" ", $date)[0]);
    $date = "Created in <span itemprop=\"dateCreated\" content=\"$list[0]-$list[1]-$list[2]\">" . $list[1] . "/" . $list[2] . "/" . $list[0]."</span>";
} else {
    $date = "";
}

//HREF Image
$hrefImage = "";
if (isset($this->image[0]['IPTC']['Source'])) {
    $hrefImage = $this->image[0]['IPTC']['Source'];
} else if (isset($this->image[0]['XMP']['Source'])) {
    $hrefImage = $this->image[0]['XMP']['Source'];
} else {
    $hrefImage = '#';
}

// Flickr
$keywords = '';
if (isset($this->image[0]['IPTC']['Keywords'])) {
    $keywords = $this->image[0]['IPTC']['Keywords'];
} else if (isset($this->image[0]['XMP']['Subject'])) {
    $keywords = $this->image[0]['XMP']['Subject'];
} else {
    $keywords = array();
}
$options = "";
foreach ($keywords as $keyword) {
    $options .= '<option id="' . $keyword . '" value="' . $keyword . '">' . $keyword . '</option>';
}
//url
$name = basename($this->image[0]['File']['FileName'], '.' . pathinfo($this->image[0]['File']['FileName'], PATHINFO_EXTENSION));

// METADATA ACCORDION
$metadata = "";

if (isset($this->image[0])) {
    foreach ($this->image[0] as $key => $values) {
        switch ($key) {
            case 'EXIF':
            case 'XMP':
            case 'IPTC':
                $metadata .= '<li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#' . $key . '">
                <b><font size="4">' . $key . '</font></b></a>
                <ul id="' . $key . '" class="collapse collapse-content">';

                foreach ($values as $k => $value) {
                    if (is_array($value)) {
                        $value = implode(", ", $value);
                    }
                    $metadata .= '<li itemprop="exifData" itemscope itemtype="http://schema.org/PropertyValue"><b itemprop="name">' . $k . '</b> : <span itemprop="value">' . strval($value) . "</span></li>";
                }
                $metadata .= '</ul>
                        </li>';
                break;
            default:
                break;
        }
    }
    if (empty($metadata) || $metadata == "") {
        $metadata = '<p class="text-center">No metadatas stored in this image</p>';
    }
}
?>

<div class="container">
    <div class="row" itemscope itemtype="//schema.org/ImageObject">
        <div class="col-sm-5">
            <div class="row">
                <p class="the-couple-statement text-center">
                    <?= $creator; ?><br><div class="date-image text-center"><?= $date ?></div>
                </p>
                <div class="row-masonry simple-gallery pop-gallery">

                <li class="grid-sizer"></li>
                <!-- required for fluid masonry layout -->
                <li class="gutter-sizer"></li>
                <!-- required for fluid masonry layout -->
                <div class="img-treatment">
                    <a class="pop-gallery-img popup-indicator"
                       href="./uploads/<?= $this->image[0]['File']['FileName'] ?>">
                        <img itemprop="contentUrl" src="./uploads/<?= $this->image[0]['File']['FileName'] ?>"
                             alt="<?= $this->image[0]['File']['FileName'] ?>"/>
                    </a>


                    <!-- <a href="<?= $hrefImage; ?>" target="_blank">
                    <img src="./uploads/<?= $this->image[0]['File']['FileName'] ?>"/>
                </a>-->
                </div>
            </div>
                <div class="text-center">
                    <a class="btn btn-default info"
                       href="index.php?t=image&amp;a=downloadImage&amp;name=<?= $this->image[0]['File']['FileName'] ?>"
                       title="">
                        <span class="glyphicon glyphicon-download-alt"></span>
                        <b>Download Image</b>
                    </a>
                    <a class="btn btn-default info"
                       href="index.php?t=image&amp;a=downloadXmp&amp;name=<?= $this->image[0]['File']['FileName'] ?>"
                       title="">
                        <span class="glyphicon glyphicon-file"></span>
                        <b>Download XMP Sidecar File</b>
                    </a>
                    <a href="index.php?t=image&amp;a=modify&amp;name=<?= $name; ?>" class="btn btn-default info"
                       title="">
                        <span class="glyphicon glyphicon-pencil"></span>
                        <b>Modify Metadatas</b>
                    </a>
                    <a href="index.php?t=image&amp;a=delete&amp;name=<?= $name; ?>" class="btn btn-default info"
                       title="">
                        <span class="glyphicon glyphicon-trash"></span>
                        <b>Delete Image</b>
                    </a>
                </div>
                <div class="flick">
                    <!-- FLICKR input -->
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        <select id="filtres" class="form-control" name="q[]" multiple="multiple"
                                data-placeholder="Search for related images on flickr..." data-width="off"
                                tabindex="-1">
                            <?= $options; ?>
                        </select>
                    </div>
                    <div class="col-xs-1">
                        <a id="bFlicker" type="submit" class="btn btn-default info"><span class="ti ti-flickr"></span>
                            <b>Search on Flickr</b></a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>

            <div class="row" id="flicker"></div>

        </div>
        <!-- /.col-sm-5 -->
        <div class="col-sm-7">
            <div class="the-couple-text-wrapper center-block">
                <div class="desc" itemprop="description">
                    <?= $description ?>
                </div>
                <div id="metadata">
                    <h6 class="text-center">Images Metadatas</h6>
                    <ul class="nav nav-stacked" id="accordion1">
                        <?= $metadata; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.col-sm-7 -->
    </div>
    <!--/.row -->

</div>