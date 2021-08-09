<?php
if(isset($_POST["submit"]))
{
  $errors = [];
  if(empty($_POST["lastName"]))
  {
    $errors[] = 'Le nom est vide.';
  }
  if(empty($_POST["firstName"]))
  {
    $errors[] = 'Le prénom est vide.';
  }
  if(empty($_POST["login"]))
  {
    $errors[] = "L'identifiant vide.";
  }
  else
  {
    if(isset($_POST["login"]) === Users::controlExist("login", $_POST["login"]))
    {
      $errors[] = "L'identifiant est deja utilisé.";
    }
  }
  if(empty($_POST["email"]))
  {
    $errors[] = "L'adresse email est vide.";
  }
  elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
  {
    $errors[] = "L'adresse email est invalide.";
  }
  else
  {
    if(isset($_POST["email"]) === Users::controlExist("email", $_POST["email"]))
    {
      $errors[] = "L'adresse email est deja utilisé.";
    }
  }
  if(empty($_POST["password"]))
  {
    $errors[] = "Le mot de passe est vide.";
  }
  if(empty($_POST["passwordBis"]))
  {
    $errors[] = "Répéter mot de passe est vide.";
  }
  if($_POST["password"] !== $_POST["passwordBis"])
  {
    $errors[] = 'Mot de passe et Répéter mot de passe sont différents.';
  }
  if(!count($errors))
  {
    $users = Users::registration($_POST['lastName'],
                                 $_POST['firstName'],
                                 $_POST['login'],
                                 $_POST['email'],
                                 md5($_POST['password'])
                                );
    $msgValid = "Compte enregistré avec succès.";
    $_POST = NULL;
  }
}
include ('pages/registrationForm.php');
?>