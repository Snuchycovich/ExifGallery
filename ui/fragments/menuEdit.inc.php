<p class="edit-article">
	<a href="index.php?t=article&amp;a=modifArticle&amp;id=<?= echo $article->getId();?>">Modfier</a>
	<a href="index.php?t=article&amp;a=supprimerArticle&amp;id=<?= echo $article->getId();?>">Supprimer</a>
	<a href="index.php?t=image&amp;a=ajouterImage&amp;idArticle=<?= echo $article->getId();?>">Ajouter Image</a>
	<a href="index.php?t=image&amp;a=trouverImage&amp;idArticle=<?= echo $article->getId();?>">Trouver Image</a>
</p>