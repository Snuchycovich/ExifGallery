<?php

$iptc = $this->image['IPTC'];
$exif = $this->image['EXIF'];
$xmp = $this->image['XMP'];
?>
<form action="<?= $action; ?>" method="POST">
    <div class="row">
        <ul class="nav nav-stacked" id="accordion1">
            <li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#creator">
                    <b><font size="4">Creator</font></b>
                </a>

                <div id="creator" class="collapse collapse-content">
                    <div class="form-group">
                        <label>
                            <input type="radio" name="creator" value="IPTC"/>
                            <span class="lbl padding-8">IPTC</span>
                        </label>
                        <input type="text" class="form-control" name="iptc-creator" value="<?= $iptc['By-line']; ?>"
                               disabled>

                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="creator" value="XMP"/>
                            <span class="lbl padding-8">XMP</span>
                        </label>
                        <input type="text" name="xmp-creator" class="form-control" value="<?= $xmp['Creator']; ?>"
                               disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="creator" value="EXIF"/>
                            <span class="lbl padding-8">EXIF</span>
                        </label>
                        <input type="text" name="exif-creator" class="form-control" value="<?= $exif['Artist']; ?>"
                               disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="lbl padding-8">Proposal</span>
                        </label>
                        <input type="text" class="form-control" name="prop-creator">

                    </div>
                </div>
            </li>
            <li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#title">
                    <b><font size="4">Headline</font></b>
                </a>

                <div id="title" class="collapse collapse-content">
                    <div class="form-group">
                        <label>
                            <input type="radio" name="title" value="IPTC"/>
                            <span class="lbl padding-8">IPTC</span>
                        </label>
                        <input type="text" class="form-control" name="iptc-title" value="<?= $iptc['Headline']; ?>"
                               disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="title" value="XMP"/>
                            <span class="lbl padding-8">XMP</span>
                        </label>
                        <input type="text" name="xmp-title" class="form-control" value="<?= $xmp['Title']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="lbl padding-8">Proposal</span>
                        </label>
                        <input type="text" class="form-control" name="prop-title">

                    </div>
                </div>
            </li>
            <li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#desc">
                    <b><font size="4">Description</font></b>
                </a>

                <div id="desc" class="collapse collapse-content">
                    <div class="form-group">
                        <label>
                            <input type="radio" name="desc" value="IPTC"/>
                            <span class="lbl padding-8">IPTC</span>
                        </label>
                            <textarea rows="4" name="iptc-desc"
                                      class="form-control" disabled><?= $iptc['Caption-Abstract']; ?></textarea>

                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="desc" value="XMP"/>
                            <span class="lbl padding-8">XMP</span>
                        </label>
                            <textarea rows="4" name="xmp-desc"
                                      class="form-control" disabled><?= $xmp['Description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="desc" value="EXIF"/>
                            <span class="lbl padding-8">EXIF</span>
                        </label>
                            <textarea rows="4" name="exif-desc"
                                      class="form-control" disabled><?= $exif['ImageDescription']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="lbl padding-8">Proposal</span>
                        </label>
                            <textarea rows="4" name="prop-desc"
                                      class="form-control"></textarea>

                    </div>
                </div>
            </li>
            <li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#rights">
                    <b><font size="4">Copyright Notice</font></b>
                </a>

                <div id="rights" class="collapse collapse-content">
                    <div class="form-group">
                        <label>
                            <input type="radio" name="rights" value="IPTC"/>
                            <span class="lbl padding-8">IPTC</span>
                        </label>
                        <input type="text" name="iptc-rights"
                               class="form-control"
                               value="<?= $iptc['CopyrightNotice']; ?>" disabled>

                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="rights" value="XMP"/>
                            <span class="lbl padding-8">XMP</span>
                        </label>
                        <input type="text" class="form-control"
                               name="xmp-rights" value="<?= $xmp['Rights']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="rights" value="EXIF"/>
                            <span class="lbl padding-8">EXIF</span>
                        </label>
                        <input type="text" class="form-control"
                               name="exif-rights"
                               value="<?= $exif['Copyright']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="lbl padding-8">Proposal</span>
                        </label>
                        <input type="text" class="form-control" name="prop-rights">

                    </div>
                </div>
            </li>
            <li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#date">
                    <b><font size="4">Date Creation</font></b>
                </a>

                <div id="date" class="collapse collapse-content">
                    <div class="form-group">
                        <label>
                            <input type="radio" name="date" value="IPTC"/>
                            <span class="lbl padding-8">IPTC</span>
                        </label>
                        <input type="text" name="iptc-date"
                               class="form-control"
                               value="<?= $iptc['DateCreated']; ?>" disabled>

                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="date" value="XMP"/>
                            <span class="lbl padding-8">XMP</span>
                        </label>
                        <input type="text" name="xmp-date"
                               class="form-control"
                               value="<?= $xmp['DateCreated']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="date" value="EXIF"/>
                            <span class="lbl padding-8">EXIF</span>
                        </label>
                        <input type="text" class="form-control"
                               name="exif-date"
                               value="<?= $exif['CreateDate']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="lbl padding-8">Proposal</span>
                        </label>
                        <div class="row">
                        <div class="col-sm-2">
                                <input class="form-control" type="text" name="prop-y" maxlength="4" placeholder="yyyy">
                            </div>
                        <div class="col-sm-1">
                                <input class="form-control" type="text" name="prop-m" maxlength="2" placeholder="mm">
                            </div>
                        <div class="col-sm-1">
                                <input class="form-control" type="text" name="prop-d" maxlength="2" placeholder="dd">
                            </div>
                    </div>
                    </div>

                </div>

            </li>
            <li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#Keywords">
                    <b><font size="4">Keywords</font></b>
                </a>

                <div id="Keywords" class="collapse collapse-content">
                    <span>Please write words separated by commas ','.</span>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="keyw" value="IPTC"/>
                            <span class="lbl padding-8">IPTC</span>
                        </label>
                            <textarea class="form-control" rows="2"
                                      name="iptc-keywords" disabled><?= implode(", ", $iptc['Keywords']); ?></textarea>

                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="keyw" value="XMP"/>
                            <span class="lbl padding-8">XMP</span>
                        </label>
                            <textarea class="form-control" name="xmp-keywords"
                                      rows="2" disabled><?= implode(", ", $xmp['Subject']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="lbl padding-8">Proposal</span>
                        </label>
                            <textarea class="form-control" name="prop-Keywords"
                                      rows="2"></textarea>

                    </div>
                </div>
            </li>
            <li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#state">
                    <b><font size="4">Province / State</font></b>
                </a>

                <div id="state" class="collapse collapse-content">
                    <div class="form-group">
                        <label>
                            <input type="radio" name="keyw" value="IPTC"/>
                            <span class="lbl padding-8">IPTC</span>
                        </label>
                        <input type="text" class="form-control"
                               name="iptc-state"
                               value="<?= $iptc['Province-State']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="keyw" value="XMP"/>
                            <span class="lbl padding-8">XMP</span>
                        </label>
                        <input type="text" class="form-control" name="xmp-state"
                               value="<?= $xmp['State']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="lbl padding-8">Proposal</span>
                        </label>
                        <input type="text" class="form-control" name="prop-state">

                    </div>
                </div>
            </li>
            <li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#Country">
                    <b><font size="4">Country</font></b>
                </a>

                <div id="Country" class="collapse collapse-content">
                    <div class="form-group">
                        <label>
                            <input type="radio" name="Country" value="IPTC"/>
                            <span class="lbl padding-8">IPTC</span>
                        </label>
                        <input type="text"
                               name="iptc-country"
                               class="form-control"
                               value="<?= $iptc['Country-PrimaryLocationName']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="Country" value="XMP"/>
                            <span class="lbl padding-8">XMP</span>
                        </label>
                        <input type="text" class="form-control"
                               name="xmp-country"
                               value="<?= $xmp['Country']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="lbl padding-8">Proposal</span>
                        </label>
                        <input type="text" class="form-control" name="prop-Country">

                    </div>
                </div>
            </li>
            <li class="panel">
                <a data-toggle="collapse" data-parent="#accordion1" href="#City">
                    <b><font size="4">City</font></b>
                </a>

                <div id="City" class="collapse collapse-content">
                    <div class="form-group">
                        <label>
                            <input type="radio" name="City" value="IPTC"/>
                            <span class="lbl padding-8">IPTC</span>
                        </label>
                        <input type="text" class="form-control" name="iptc-city"
                               value="<?= $iptc['City']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="City" value="XMP"/>
                            <span class="lbl padding-8">XMP</span>
                        </label>
                        <input type="text" class="form-control" name="xmp-city"
                               value="<?= $xmp['City']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="lbl padding-8">Proposal</span>
                        </label>
                        <input type="text" class="form-control" name="prop-City">

                    </div>

                </div>
            </li>
        </ul>
    </div>
    <br>

    <div class="text-right">
        <a href="<?= str_replace("save", "view", $action); ?>" class="btn btn btn-warning"><span
                class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;Return&nbsp;</a>
        <button class="btn btn btn-success" type="submit"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Save&nbsp;
        </button>
    </div>
</form>