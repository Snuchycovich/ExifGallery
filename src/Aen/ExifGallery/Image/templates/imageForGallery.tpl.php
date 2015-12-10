<li class="col-xs-10 col-md-8">
  <a href="index.php?t=image&amp;a=view&amp;name=<?= urlencode(json_decode($this->image, true)["filename"]);?>" class="color-inherit-link" >
    <figure class="center-block col-sm-12 clickedimage">
      <img id="<?= json_decode($this->image, true)["filename"];?>" 
      style="width:400px;height:150px" 
      src="<?= json_decode($this->image, true)["url"];?>" 
      alt="<?= json_decode($this->image, true)["name"];?>" class="img-circle img-responsive">
      <figcaption>
        <p><?= json_decode($this->image, true)["name"];?><br>
          By <?= json_decode($this->image, true)["creator"];?>
        </p>
      </figcaption>
    </figure>
  </a>
</li>