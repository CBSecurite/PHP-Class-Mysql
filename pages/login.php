<?php
if(isset($_POST["submit"]))
{
  $errors = [];
  if(empty($_POST["email"]))
  {
    $errors[] = "L'adresse email est vide.";
  }
  elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
  {
    $errors[] = "L'adresse email est invalide.";
  }
  if(empty($_POST["password"]))
  {
    $errors[] = 'Le mot de passe vide.';
  }
  if(!empty($_POST["email"]) && !empty($_POST["password"]))
  {
    $user = Users::connexion($_POST['email'], md5($_POST['password']));
    if(!$user)
    {
      $errors[] = 'Identification incorrecte.';
    }
  }
  if(count($errors))
  {
    include ('pages/loginForm.php');
  }
  else
  {
    $_SESSION['userId'] = $user["id"];
    header("Location: ?page=profile&id=" . md5($user["id"]));
  }
  $users = NULL;
}
else
{
  include ('pages/loginForm.php');
}
?>