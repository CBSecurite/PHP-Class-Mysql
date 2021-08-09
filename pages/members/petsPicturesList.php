<div class="title">Ajouter une photo d'un de mes animaux</div>
<div class="addPet">
  <?php
  include("pages/members/petsPicturesAdd.php");
  ?>
</div>
<div class="title">Liste des photos de mes animaux</div>
<?php
$petsPictures = PetsPictures::editPetsPictures($_SESSION['userId']);
echo '<div class="listPet">';
if(count($petsPictures))
{
  foreach($petsPictures as $petsPicture)
  {
    include("pages/members/petsPicturesEdit.php");
  }
}
echo '</div>';
?>