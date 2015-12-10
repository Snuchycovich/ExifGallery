<li class="img-treatment">
    <a class="pop-gallery-img popup-indicator" href="./uploads/<?= json_decode($this->image, true)['filename'];?>">
        <img src="<?= json_decode($this->image, true)['url'];?>" 
        alt="<?= json_decode($this->image, true)["filename"];?>"/>
   </a> 
</li>
