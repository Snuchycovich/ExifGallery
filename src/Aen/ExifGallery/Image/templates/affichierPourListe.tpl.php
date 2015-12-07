<figure>
	<a class="imageArticle" href="<?= $this->document->getChemin();?>" 
		title="<?= $this->document->getTitre();?> - 
		<?= $this->document->getPhotographe();?> - 
		<?= $this->document->getDroits();?>">
		<img  src="<?= $this->document->getThumb();?>" 
		alt="<?= $this->document->getTitre();?>"></a>
</figure>
