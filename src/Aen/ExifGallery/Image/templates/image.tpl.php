<?php

//info search
$creator = "";
$creatorUrl;
if (isset($this->image[0]["XMP"]["Creator"])) {
    $creator = "By ". $this->image[0]["XMP"]["Creator"]."<br>";
}

if (isset($this->image[0]["XMP"]["CreatorWorkURL"])) {
    $creatorUrl = '( <a target="_blank" href="'.$this->image[0]["XMP"]["CreatorWorkURL"].'">
        <font size="2">'.$this->image[0]["XMP"]["CreatorWorkURL"].'</font></a>)';
}


if (isset($this->image[0]["IPTC"]["DateCreated"])) {
    $list = explode(":", $this->image[0]["IPTC"]["DateCreated"]);
    $date = "Created in " . $list[1] . "/" . $list[2] . "/" . $list[0];
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
    $options .= '<option id="'.$keyword.'" value="'.$keyword.'">'.$keyword.'</option>';
}

// METADATA ACCORDION
$metadata = "";

if (isset($this->image[0])) {
    foreach ($this->image[0] as $key => $values) {
        switch ($key) {
            case 'EXIF':
            case 'XMP':
            case 'IPTC':
                    $metadata .= '<li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#'.$key.'">
                <b><font size="4">'.$key.'</font></b></a>
                <ul id="'.$key.'" class="collapse">';

                foreach ($values as $k => $value) {
                    if ($k !== "FileName" && $k !== "Directory") {
                        if (is_array($value)) {
                            $value = implode(", ", $value);
                        }
                        $metadata .= "<li><b>" . $k . '</b> : ' . strval($value) . "</li>";
                            
                    }
                }
                $metadata .='</ul>
                        </li>';
                break;
            default:
                break;
        }
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-5">
            <br/>
                <div class="row center-block input-group input-group-sm ">
                     <!-- FLICKR input -->
                    <div class="col-xs-12 col-md-7">
                        <select id="filtres" class="form-control" name="q[]" multiple="multiple"
                                data-placeholder="Search for related images on flicker..." data-width="off"
                                tabindex="-1">
                                <?= $options;?>
                        </select>
                    </div>
                    <div class="col-xs-2 col-md-2">
                        <button id="bFlicker" type="submit" class="btn btn-default"><span class="ti ti-flickr"></span></button>
                    </div>
                    <!-- End FLICKR input -->
                    <div class="col-xs-4 col-md-3">
                        <div class="btn-group" role="group">
                            <a class="btn btn-default" href="index.php?t=image&amp;a=downloadImage&amp;name=<?= $this->image[0]['File']['FileName'] ?>">
                                <span class="glyphicon glyphicon-download-alt"></span>
                            </a>
                            <a class="btn btn-default" href="index.php?t=image&amp;a=downloadXmp&amp;name=<?= $this->image[0]['File']['FileName'] ?>">
                                <span class="ti ti-file"></span>
                            </a>
                        </div>

                    </div>
                </div>
            <br/>
            <div class="img-treatment">
                <a href="<?= $hrefImage; ?>" target="_blank">
                    <img src="./uploads/<?= $this->image[0]['File']['FileName'] ?>"/>
                </a>
            </div>
        </div>
        <!-- /.col-xs-6 -->
        <div class="col-xs-7">
            <div class="the-couple-text-wrapper center-block text-center">
                <p class="the-couple-statement">
                    <?= $creator; ?>
                    <?= $creatorUrl; ?>
                <h2 class="the-couple-date h3"><?= $date ?></h2>
            </div>
            <p>
            <blockquote>
                <font size="2">
                    <?= $this->image[0]["IPTC"]["Caption-Abstract"]?>
                </font>
            </blockquote>
            </p>

        </div>
        <!-- /.col-xs-6 -->
    </div>
    <!--/.row -->
    <div class="row">
        <div id="flicker" class="col-xs-2"></div>
        <div id="metadata" class="col-xs-8 center-block">
            <h2 class="text-center">Images Metadatas</h2>
            <ul class="nav nav-stacked" id="accordion1">
                <?= $metadata; ?>
            </ul>
        </div>
    </div>
</div>
<a href="#" class="go-to-top scroll-panel-top"><span class="ti ti-arrow-up"></span></a>
