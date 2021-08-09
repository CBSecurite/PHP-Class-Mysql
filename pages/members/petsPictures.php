<div class="petsPictures">
  <div class="header">
    <img src="assets/images/petsPictures.png">
    <div class="info">
      <h1>Photos animaux</h1>
    </div>
  </div>
  <section>
    <?php
    if(isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] === "delete")
    {
      include("pages/members/petsPicturesDelete.php");
    }
    else
    {
      include("pages/members/petsPicturesList.php");
    }
    ?>
  </section>
</div>