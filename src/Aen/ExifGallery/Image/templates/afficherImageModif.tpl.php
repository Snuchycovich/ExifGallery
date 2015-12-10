<?php

echo <<<EOT
	<figure>
		<img src="{$this->document->getThumb()}" alt="{$this->document->getTitre()}">
		<div class="btns">
		<a class="editBtn btnEdition" title="Modifier Article" 
		href="index.php?t=image&a=modifImage&amp;id={$this->document->getId()}">
		<span class="hidden">Modifier</span></a> - 
		<a class="supprBtn btnEdition" title="Supprimer Article" 
		href="index.php?t=image&amp;a=supprimerImage&amp;id={$this->document->getId()}">
		<span class="hidden">Supprimer</span></a>
		</div>
	</figure>
EOT;
