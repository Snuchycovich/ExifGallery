<li class="img-treatment">
	<a href="index.php?t=image&amp;a=view&amp;name=<?= urlencode(json_decode($this->image, true)["filename"]);?>" class="pop-gallery-img color-inherit-link" >
    	<figure class="clickedimage">
            <figcaption>
                <p>
                    <?= json_decode($this->image, true)["name"];?><br/>
                    By <?= json_decode($this->image, true)["creator"];?>
                </p>
            </figcaption>
        <img src="<?= json_decode($this->image, true)['url'];?>"
        alt="<?= json_decode($this->image, true)["filename"];?>"/>

     </figure>
   </a> 
</li>
