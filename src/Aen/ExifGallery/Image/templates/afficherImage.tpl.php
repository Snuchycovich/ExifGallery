<?php
echo <<<EOT
	<figure>
		<img src="{$this->document->getMedium()}" alt="{$this->document->getTitre()}">
		<figcaption class="metaData">
		<h3 class="image-titre">{$this->document->getTitre()}</h3>
		<p class="droits">{$this->document->getPhotographe()} - {$this->document->getDroits()}</p>
		</figcaption>
	</figure>
EOT;
