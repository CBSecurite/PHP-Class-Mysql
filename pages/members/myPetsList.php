<div class="title">Ajouter un animal</div>
<div class="addPet">
  <?php
  include("pages/members/myPetsAdd.php");
  ?>
</div>
<div class="title">Liste des animaux</div>
<div class="listPet">
  <?php
  include("pages/members/myPetsEdit.php");
  $myPets = Pets::myPets($_SESSION["userId"]);
  if(count($myPets))
  {
    foreach($myPets as $pets)
    {
      include("pages/members/myPetsEditForm.php");
    }
  }
  ?>
</div>