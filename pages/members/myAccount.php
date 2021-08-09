<?php
$userInfos = Users::userInfos($_SESSION["userId"]);
if(isset($_POST["changeInfos"]))
{
  $errors = [];
  if(empty($_POST["lastName"]))
  {
    $errors[] = "Nom vide.";
  }
  if(empty($_POST["firstName"]))
  {
    $errors[] = "Prénom vide.";
  }
  if(empty($_POST["login"]))
  {
    $errors[] = "Identifiant vide.";
  }
  if(empty($_POST["email"]))
  {
    $errors[] = "Adresse email vide.";
  }
  if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
  {
    $errors[] = "L'adresse email est invalide.";
  }
  if(!count($errors))
  {
    $changedInfos = 0;
    if($userInfos->last_name != $_POST["lastName"])
    {
      Users::changeValue($_SESSION["userId"], "last_name",$_POST["lastName"]);
      $changedInfos++;
    }
    if($userInfos->first_name != $_POST["firstName"])
    {
      Users::changeValue($_SESSION["userId"], "first_name", $_POST["firstName"]);
      $changedInfos++;
    }
    if($userInfos->login != $_POST["login"])
    {
      Users::changeValue($_SESSION["userId"], "login", $_POST["login"]);
      $changedInfos++;
    }
    if($userInfos->email != $_POST["email"])
    {
      Users::changeValue($_SESSION["userId"], "email", $_POST["email"]);
      $changedInfos++;
    }
    $userInfos = Users::userInfos($_SESSION["userId"]);
    if($changedInfos > 0)
    {
      $msgValid = "Informations personnelles changées avec succès.";
    }
  }
}
if(isset($_POST["changePassword"]))
{
  $errorsPassword = [];
  if(empty($_POST["password"]))
  {
    $errorsPassword[] = "Ancien mot de passe vide.";
  }
  else
  {
    if(md5($_POST["password"]) != $userInfos->password)
    {
      $errorsPassword[] = "Ancien mot de passe vide.";
    }
  }
  if(empty($_POST["newPassword"]))
  {
    $errorsPassword[] = "Nouveau mot de passe vide.";
  }
  if(empty($_POST["newPasswordBis"]))
  {
    $errorsPassword[] = "Répéter mot de passe vide.";
  }
  if($_POST["newPassword"] != $_POST["newPasswordBis"])
  {
    $errorsPassword[] = "Nouveau mot de passe et Répéter mot de passe sont differents.";
  }
  if(!count($errorsPassword)){
    Users::changeValue($_SESSION["userId"], "password", md5($_POST["newPassword"]));
    $msgValidPassword = "Mot de passe changé avec succès.";
    $_POST = NULL;
  }
}
include ('pages/members/myAccountForm.php');
?>