<?php

echo <<<EOT
	<figure>
		<img src="{$this->document->getMedium()}" alt="{$this->document->getTitre()}">
	</figure>
EOT;
