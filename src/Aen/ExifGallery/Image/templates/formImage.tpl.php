<form method="POST" action="<?php echo $action; ?>" enctype="multipart/form-data">
	<fieldset>
		<legend>Image</legend>
		<label for="image">Charger image</label>
		<input type="file" name="image" value="<?php echo $this->document->getChemin(); ?>" id="image"><br />
		<div class="error"><?php echo $this->getErreur('image'); ?></div>
		<figure id="imageModif"><img src="<?php echo $this->document->getMedium(); ?>" alt=""></figure>
		<label for="titre">Titre</label><br />
		<input type="text" name="titre" value="<?php echo $this->document->getTitre(); ?>" id="titre"/><br />
		<div class="error"><?php echo $this->getErreur('titre'); ?></div>
		<label for="photographe">Photographe</label><br/>
		<input type="text" name="photographe" 
		value="<?php echo $this->document->getPhotographe(); ?>" id="photographe"/><br />
		<div class="error"><?php echo $this->getErreur('photographe'); ?></div>
	</fieldset>
	<fieldset>
		<legend>Droits</legend>	
		<label for="droits">Droits</label><br />
		<input type="text" name="droits" id="droits" value="<?php echo $this->document->getDroits(); ?>"><br />
		<div class="error"><?php echo $this->getErreur('droits')?></div>
	</fieldset>
	<input type="hidden" name="idArticle" value="<?php echo $this->document->getIdArticle(); ?>"/>
	<input type="hidden" name="id" value="<?php echo $this->document->getId(); ?>"/>
	<button type="submit">Enregistrer</button> <button type="button" onclick="javascript:history.back()">Annuler</button>
</form>