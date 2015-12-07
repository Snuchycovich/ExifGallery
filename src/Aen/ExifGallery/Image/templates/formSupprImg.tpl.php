<form method="POST" action="<?php echo $action; ?>">
	<input type="hidden" name="id" value="<?php echo $this->document->getId(); ?>">
	<p class="btns"><button type="button" onclick="javascript:history.back()">
		Annuler</button><button type="submit">Supprimer</button></p>
</form>