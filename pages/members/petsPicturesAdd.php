<?php
if (isset($_POST["ajouter"]) && isset($_GET["action"]) && $_GET["action"] === "add")
{
  $errors = [];
  $extensionsValids = array("jpg" ,"jpeg" ,"gif" ,"png");
  $maxSize = 1048576;
  if (empty($_FILES['picture']["name"]))
  {
    $errors[] = "Aucun fichier présent.";
  }
  else
  {
    $extensionUpload = strtolower(substr(strrchr($_FILES["picture"]["name"], "."),1));
    $imageSize = getimagesize($_FILES["picture"]["tmp_name"]);
    if(!in_array($extensionUpload, $extensionsValids))
    {
      $errors[] = "L'extension de l'image n'est pas valide (autorisée : jpg, jpeg, gif ou png).";
    }
    if ($_FILES["picture"]["size"] > $maxSize)
    {
      $errors[] = "Le fichier de l'image est supérieur a 1 Mo.";
    }
    if ($imageSize[0] > "800" || $imageSize[1] > "600")
    {
      $errors[] = "Le format de l'image doit etre inférieur a 640 pixel x 480 pixel.";
    }
  }
  if (!count($errors))
  {
    $file = $_SESSION["userId"] . "_" . $_POST["petsName"] . "_" . date("YmdHis") . "_"
            . substr(uniqid('', true), 0, 6) . "." . $extensionUpload;
    $upload = move_uploaded_file($_FILES['picture']['tmp_name'], "assets/images/pets/" . $file);
    PetsPictures::addPetPicture($_POST["petsName"], $file);
    header("Location: ?page=pets-pictures");
  }
  if (isset($errors) && count($errors))
  {
    echo "<div class='msg error'><h4>Erreurs d'ajout de la photo de l'animal :</h4><ul>";
    foreach ($errors as $value)
    {
      echo "<li>" . $value . "</li>";
    }
    echo "</ul></div>";
  }
}
include("pages/members/petsPicturesAddForm.php");
?>