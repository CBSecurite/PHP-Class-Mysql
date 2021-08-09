<?php
if(isset($_POST["changeInfos"]) && isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] === "edit")
{
  $myPet = Pets::editPets($_GET["id"]);
  $errors = [];
  if($myPet)
  {
    if($_POST["category"] !== $myPet->category_name)
    {
      $edit = Pets::updateInfoPets($_SESSION["userId"], $_GET["id"], "category", $_POST["category"]);
      if(!$edit)
      {
        $errors[] = "Modification de la catégorie impossible.";
      }
    }
    if(empty($_POST["name"]))
    {
      $errors[] = "Le nom est vide.";
    }
    elseif(!empty($_POST["name"]) && $_POST["name"] !== $myPet->name)
    {
      $edit = Pets::updateInfoPets($_SESSION["userId"], $_GET["id"], "name", $_POST["name"]);
      if(!$edit)
      {
        $errors[] = "Modification du nom impossible.";
      }
    }
    if(empty($_POST["name"]))
    {
      $errors[] = "L'age est vide.";
    }
    elseif($_POST["age"] !== $myPet->age  && !empty($_POST["name"]) && !filter_var($_POST['age'], FILTER_VALIDATE_INT))
    {
      $errors[] = "L'age doit être un nombre.";
    }
    elseif($_POST["age"] !== $myPet->age  && !empty($_POST["name"]) && filter_var($_POST['age'], FILTER_VALIDATE_INT))
    {
      $edit = Pets::updateInfoPets($_SESSION["userId"], $_GET["id"], "age", $_POST["age"]);
      if(!$edit)
      {
        $errors[] = "Modification de l'age impossible.";
      }
    }
    if($_POST["ageUnit"] !== $myPet->age_unit)
    {
      $edit = Pets::updateInfoPets($_SESSION["userId"], $_GET["id"], "age_unit", $_POST["ageUnit"]);
      if(!$edit)
      {
        $errors[] = "Modification de l'unité d'age impossible.";
      }
    }
  }
  else
  {
    $errors[] = "Modification impossible.";
  }

  if(isset($errors) && count($errors)){
    echo "<div class='msg error'><h4>Erreurs de modification de l'animal :</h4><ul>";
    foreach($errors as $value)
    {
      echo "<li>" . $value . "</li>";
    }
    echo "</ul></div>";
  }
  else
  {
    echo "<div class='msg valid'><h4>Modification de l'animal effectué</h4></div>";
  }
}
?>