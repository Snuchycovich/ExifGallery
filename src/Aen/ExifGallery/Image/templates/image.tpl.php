<?php

require_once("../Model/FileModel.php");
use \App\Model\FileModel;

$model = new FileModel(pathinfo($_POST["url"])['filename'] . ".json", "../data/");
$json = $model->getFileContent();
$url = "app/uploads/";
?>

<a id="infos" class="close ti ti-close" xmlns="http://www.w3.org/1999/html"></a>
<div class="container vertical-align-middle">
    <h2 class="theme-title"> <?= $json["XMP"]["Title"] ?></h2>

    <div class="row">
        <div class="col-xs-5">
            <br/>
                <div class="row center-block input-group input-group-sm ">
                    <div class="col-xs-12 col-md-7">
                        <!--<form action="app/View/flickerSearch.php" method="post" enctype="multipart/form-data">-->
                        <select id="filtres" class="form-control" name="q[]" multiple="multiple"
                                data-placeholder="Search for related images on flicker..." data-width="off"
                                tabindex="-1">
                            <?php
                            if(isset($json['IPTC']['Keywords']))
                                $keywords = $json['IPTC']['Keywords'];
                            else if(isset($json['XMP']['Subject']))
                                $keywords = $json['XMP']['Subject'];
                            else $keywords=array();
                            foreach ($keywords as $keyword) { ?>
                                <option id="<?= $keyword ?>" value="<?= $keyword ?>"><?= $keyword ?></option>
                            <?php } ?>
                        </select>
                       <!-- </form>-->
                    </div>

                    <div class="col-xs-2 col-md-2">
                        <button id="bFlicker" type="submit" class="btn btn-default"><span class="ti ti-flickr"></span></button>
                    </div>
                    <div class="col-xs-4 col-md-3">
                        <div class="btn-group" role="group">
                            <a class="btn btn-default" href="?a=download&img=<?= $_POST["url"] ?>"><span
                                    class="glyphicon glyphicon-download-alt"></span></a>
                            <a class="btn btn-default" href="?a=downloadXMP&file=<?= $_POST["url"] ?>"><span
                                    class="ti ti-file"></span></a>
                        </div>

                    </div>
                </div>
            <br/>
            <div class="img-treatment">
                <a href="<?php if(isset($json['IPTC']['Source'])) echo $json['IPTC']['Source']; else if(isset($json['XMP']['Source'])) echo $json['XMP']['Source'];?>" target="_blank"><img src="<?= $url . $_POST["url"] ?>"/></a>
            </div>
        </div>
        <!-- /.col-xs-6 -->
        <div class="col-xs-7">
            <div class="the-couple-text-wrapper center-block text-center">
                <?php if (isset($json["XMP"]["Creator"])) { ?>
                    <p class="the-couple-statement">
                        By <?= $json["XMP"]["Creator"] ?><br>
                        <?php if (isset($json["XMP"]["CreatorWorkURL"])) { ?>
                            (<a target="_blank" href="<?= $json["XMP"]["CreatorWorkURL"] ?>"><font
                                    size="2"><?= $json["XMP"]["CreatorWorkURL"] ?></font></a>)
                        <?php } ?>
                    </p>
                <?php } ?>
                <?php if (isset($json["IPTC"]["DateCreated"])) {
                    $list = explode(":", $json["IPTC"]["DateCreated"]);
                    $date = "Created in " . $list[1] . "/" . $list[2] . "/" . $list[0];
                } else
                    $date = "";
                ?>
                <h2 class="the-couple-date h3"><?= $date ?></h2>
            </div>
<p>
    <blockquote><font size="2">
                    <?= $json["IPTC"]["Caption-Abstract"]?>
                </font>
            </blockquote>
</p>

        </div>
        <!-- /.col-xs-6 -->
    </div>
    <!--/.row -->
    <div class="row">
        <div id="flicker" class="col-xs-2">

        </div>
        <div id="metadata" class="col-xs-8 center-block">
            <h2 class="text-center">Images Metadatas</h2>
            <ul class="nav nav-stacked" id="accordion1">
                <?php
                if (isset($json))
                    foreach ($json as $key => $values) {
                        if ($key !== "SourceFile" && $key !== "ExifTool") {
                            ?>
                            <li class="panel"><a data-toggle="collapse" data-parent="#accordion1" href="#<?= $key ?>">
                                    <b><font size="4"><?= $key ?></font></b></a>

                                <ul id="<?= $key ?>" class="collapse">
                                    <?php
                                    foreach ($values as $k => $value) {
                                        if($k !== "FileName" && $k !== "Directory"){
                                        if (is_array($value))
                                            $value = implode(", ", $value);
                                        echo "<li><b>" . $k . '</b> : ' . strval($value) . "</li>";
                                        }} ?>
                                </ul>
                            </li>
                        <?php }
                    } ?>
            </ul>
        </div>
    </div>
</div>
<a href="#" class="go-to-top scroll-panel-top"><span class="ti ti-arrow-up"></span></a>
<style media="screen" type="text/css">
    #accordion1 li.panel {
        margin-bottom: 0px;
    }

    ;
</style>