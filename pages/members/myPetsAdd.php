<?php
if(isset($_POST["ajouter"]) && isset($_GET["action"]) && $_GET["action"] === "add")
{
  $errors = [];
  if(empty($_POST['name']))
  {
    $errors[] = "Le nom est vide.";
  }
  if(empty($_POST['age']))
  {
    $errors[] = "L'age est vide.";
  }
  elseif(!empty($_POST['age']) && !filter_var($_POST['age'], FILTER_VALIDATE_INT))
  {
    $errors[] = "L'age doit être un nombre.";
  }
  if(!count($errors))
  {
    Pets::addPets($_SESSION["userId"], $_POST["category"], $_POST["name"], $_POST["age"], $_POST["ageUnit"]);
    header("Location: ?page=my-pets");
  }
  if(isset($errors) && count($errors)){
    echo "<div class='msg error'><h4>Erreurs d'ajout de l'animal :</h4><ul>";
    foreach($errors as $value)
    {
      echo "<li>" . $value . "</li>";
    }
    echo "</ul></div>";
  }
}
include("pages/members/myPetsAddForm.php");
?>