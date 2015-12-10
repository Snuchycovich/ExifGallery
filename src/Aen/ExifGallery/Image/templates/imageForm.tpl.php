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
			<div class="form-group"><label for="">By line</label><input type="text" class="form-control" value="<?= $iptc['By-line'];?>"></div>
			<div class="form-group"><label for="">Headline</label><input type="text" class="form-control" value="<?= $iptc['Headline'];?>"></div>
			<div class="form-group"><label for="">Caption Abstract</label><textarea rows="4" class="form-control"><?= $iptc['Caption-Abstract'];?></textarea></div>
			<div class="form-group"><label for="">Copyright Notice</label><input type="text" class="form-control" value="<?= $iptc['CopyrightNotice'];?>"></div>
			<div class="form-group"><label for="">Date Created</label><input type="text" class="form-control" value="<?= $iptc['DateCreated'];?>"></div>
			<div class="form-group"><label for="">Keywords</label><textarea class="form-control" rows="3"><?= implode(", ", $iptc['Keywords']);?></textarea></div>
			<div class="form-group"><label for="">Province / State</label><input type="text" class="form-control" value="<?= $iptc['Province-State'];?>"></div>
			<div class="form-group"><label for="">Country Primary Location Name</label><input type="text" class="form-control" value="<?= $iptc['Country-PrimaryLocationName'];?>"></div>
			<div class="form-group"><label for="">City</label><input type="text" class="form-control" value="<?= $iptc['City'];?>"></div>
			
		</div>
		<div class="col-md-4">
			<h3>EXIF</h3>
			<div class="form-group"><label for="">Artist</label><input type="text" class="form-control" value="<?= $exif['Artist'];?>"></div>
			<div class="form-group"><label for="">Image Description</label><textarea rows="4" class="form-control"><?= $exif['ImageDescription'];?></textarea></div>
			<div class="form-group"><label for="">Copyright</label><input type="text" class="form-control" value="<?= $exif['Copyright'];?>"></div>
			<div class="form-group"><label for="">Create Date</label><input type="text" class="form-control" value="<?= $exif['CreateDate'];?>"></div>
		</div>
		<div class="col-md-4">
			<h3>XMP</h3>
			<div class="form-group"><label for="">Creator</label><input type="text" class="form-control" value="<?= $xmp['Creator'];?>"></div>
			<div class="form-group"><label for="">Title</label><input type="text" class="form-control" value="<?= $xmp['Title'];?>"></div>
			<div class="form-group"><label for="">Description</label><textarea rows="4" class="form-control"><?= $xmp['Description'];?></textarea></div>
			<div class="form-group"><label for="">Rights</label><input type="text" class="form-control" value="<?= $xmp['Rights'];?>"></div>
			<div class="form-group"><label for="">Date Created</label><input type="text" class="form-control" value="<?= $xmp['DateCreated'];?>"></div>
			<div class="form-group"><label for="">Subject</label><textarea class="form-control" rows="3"><?= implode(", ", $xmp['Subject']);?></textarea></div>
			<div class="form-group"><label for="">State</label><input type="text" class="form-control" value="<?= $xmp['State'];?>"></div>
			<div class="form-group"><label for="">Country</label><input type="text" class="form-control" value="<?= $xmp['Country'];?>"></div>
			<div class="form-group"><label for="">City</label><input type="text" class="form-control" value="<?= $xmp['City'];?>"></div>
		</div>
	</div>
	
	<button type="submit">Save</button>	
</form>
