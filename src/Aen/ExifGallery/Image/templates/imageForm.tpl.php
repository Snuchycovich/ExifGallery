<?php


$metadata = "";


$iptc = $this->image['IPTC'];
$exif = $this->image['EXIF'];
$xmp = $this->image['XMP'];
?>
<form action="<?= $action;?>" method="POST">
	<div class="row">
		<div class="col-md-4">
			<h3>IPTC</h3>
			<div class="form-group"><label for="">By line</label><input type="text" class="form-control" name="iptc-creator" value="<?= $iptc['By-line'];?>"></div>
			<div class="form-group"><label for="">Headline</label><input type="text" class="form-control" name="iptc-title" value="<?= $iptc['Headline'];?>"></div>
			<div class="form-group"><label for="">Caption Abstract</label><textarea rows="4" name="iptc-desc" class="form-control"><?= $iptc['Caption-Abstract'];?></textarea></div>
			<div class="form-group"><label for="">Copyright Notice</label><input type="text" name="iptc-rights" class="form-control" value="<?= $iptc['CopyrightNotice'];?>"></div>
			<div class="form-group"><label for="">Date Created</label><input type="text" name="iptc-date" class="form-control" value="<?= $iptc['DateCreated'];?>"></div>
			<div class="form-group"><label for="">Keywords</label><textarea class="form-control" rows="3" name="iptc-keywords"><?= implode(", ", $iptc['Keywords']);?></textarea></div>
			<div class="form-group"><label for="">Province / State</label><input type="text" class="form-control" name="iptc-state" value="<?= $iptc['Province-State'];?>"></div>
			<div class="form-group"><label for="">Country Primary Location Name</label><input type="text" name="iptc-country" class="form-control" value="<?= $iptc['Country-PrimaryLocationName'];?>"></div>
			<div class="form-group"><label for="">City</label><input type="text" class="form-control" name="iptc-city" value="<?= $iptc['City'];?>"></div>
			
		</div>
		<div class="col-md-4">
			<h3>XMP</h3>
			<div class="form-group"><label for="">Creator</label><input type="text" name="xmp-creator" class="form-control" value="<?= $xmp['Creator'];?>"></div>
			<div class="form-group"><label for="">Title</label><input type="text" name="xmp-title" class="form-control" value="<?= $xmp['Title'];?>"></div>
			<div class="form-group"><label for="">Description</label><textarea rows="4" name="xmp-desc" class="form-control"><?= $xmp['Description'];?></textarea></div>
			<div class="form-group"><label for="">Rights</label><input type="text" class="form-control" name="xmp-rights" value="<?= $xmp['Rights'];?>"></div>
			<div class="form-group"><label for="">Date Created</label><input type="text" name="xmp-date" class="form-control" value="<?= $xmp['DateCreated'];?>"></div>
			<div class="form-group"><label for="">Subject</label><textarea class="form-control" name="xmp-keywords" rows="3"><?= implode(", ", $xmp['Subject']);?></textarea></div>
			<div class="form-group"><label for="">State</label><input type="text" class="form-control" name="xmp-state" value="<?= $xmp['State'];?>"></div>
			<div class="form-group"><label for="">Country</label><input type="text" class="form-control" name="xmp-country" value="<?= $xmp['Country'];?>"></div>
			<div class="form-group"><label for="">City</label><input type="text" class="form-control" name="xmp-city" value="<?= $xmp['City'];?>"></div>
		</div>
		<div class="col-md-4">
			<h3>EXIF</h3>
			<div class="form-group"><label for="">Artist</label><input type="text" name="exif-creator" class="form-control" value="<?= $exif['Artist'];?>"></div>
			<div class="form-group"><label for="">Image Description</label><textarea rows="4" name="exif-desc" class="form-control"><?= $exif['ImageDescription'];?></textarea></div>
			<div class="form-group"><label for="">Copyright</label><input type="text" class="form-control" name="exif-rights" value="<?= $exif['Copyright'];?>"></div>
			<div class="form-group"><label for="">Create Date</label><input type="text" class="form-control" name="exif-date" value="<?= $exif['CreateDate'];?>"></div>
		</div>

	</div>
	<div class="text-right">
	<a href="<?= str_replace("save","view",$action);?>" class="btn btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;Return&nbsp;</a>
	<button class="btn btn btn-success" type="submit"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Save&nbsp;</button>
		</div>
</form>
