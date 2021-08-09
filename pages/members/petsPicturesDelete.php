<?php
PetsPictures::deletePetPicture($_GET["id"]);
header("Location: ?page=pets-pictures");
?>