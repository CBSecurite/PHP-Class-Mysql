<div class="myPets">
  <div class="header">
    <img src="assets/images/myPets.png">
    <div class="info">
      <h1>Mes animaux</h1>
    </div>
  </div>
    <section>
      <?php
      if(isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] === "delete")
      {
        include("pages/members/myPetsDelete.php");
      }
      else
      {
        include("pages/members/myPetsList.php");
      }
      ?>
    </section>
</div>