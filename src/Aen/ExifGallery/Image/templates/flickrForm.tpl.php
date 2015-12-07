<form method="post" action="index.php?t=image&amp;a=enregistrerImageFlickr" id="imgForm">
	<div class="form">
		<input type="hidden" name="idArticle" value="<?php echo $this->document->getIdArticle(); ?>"/>
		<p class="soustitre">Trouvez une image Flickr pour illustrer l'article</p>
		<input type="text" name="searchImg" value="" id="tags">
		<button type="button" id="imgFormBtn">Chercher</button>
		<button type="submit" id="submitBtn">Enregistrer</button>
		<!--<a class="btn" href="index.php?t=article&amp;a=afficherArticle&amp;id=<?= $this->document->getIdArticle();?>">
			Annuler</a>-->
			<button type="button" onclick="javascript:history.back()">Retour</a>
	</div>
	<div id="flickrContainer"></div>
	<a id="btnHautFlickr" class="btn" href="#submitBtn" title="Retour en haut pour enregistrer votre sélection">
		Retour en haut des images</a>
</form>