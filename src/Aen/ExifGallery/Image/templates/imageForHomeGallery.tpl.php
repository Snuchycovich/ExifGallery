<li class="img-treatment" itemscope itemtype="http://schema.org/ImageObject">
	<a href="index.php?t=image&amp;a=view&amp;name=<?= urlencode(json_decode($this->image, true)["filename"]);?>" class="pop-gallery-img color-inherit-link" >
    	<figure class="clickedimage">
            <figcaption>
                <p>
                    <span itemprop="name"><?= json_decode($this->image, true)["name"];?></span><br/>
                    By <span itemprop="author"><?= json_decode($this->image, true)["creator"];?></span>
                </p>
            </figcaption>
        <img itemprop="contentUrl" src="<?= json_decode($this->image, true)['url'];?>"
        alt="<?= json_decode($this->image, true)["filename"];?>"/>
     </figure>
   </a> 
</li>
