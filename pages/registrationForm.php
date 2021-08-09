<form class="registration" method="post" action="?page=registration">
  <div class="title">Inscription</div>
  <div class="form">
    <?php
    if(isset($errors) && count($errors)){
      echo "<div class='msgInfo error'><h4>Erreurs :</h4><ul>";
      foreach($errors as $value)
      {
        echo "<li>" . $value . "</li>";
      }
      echo "</ul></div>";
    }
    if(isset($msgValid))
    {
      echo "<div class='msgInfo valid'><h4>" . $msgValid . "</h4></div>";
    }
    ?>
    <label for="lastName">Nom :</label>
    <input type="text" name="lastName" id="lastName"
           value="<?php if(isset($_POST["lastName"])) { echo $_POST["lastName"]; }  ?>">
    <label for="firstName">Prénom :</label>
    <input type="text" name="firstName" id="firstName"
           value="<?php if(isset($_POST["firstName"])) { echo $_POST["firstName"]; }  ?>">
    <label for="login">Identifiant :</label>
    <input type="text" name="login" id="login"
           value="<?php if(isset($_POST["login"])) { echo $_POST["login"]; }  ?>">
    <label for="email">Adresse email :</label>
    <input type="email" name="email" id="email"
           value="<?php if(isset($_POST["email"])) { echo $_POST["email"]; }  ?>">
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password"
           value="<?php if(isset($_POST["password"])) { echo $_POST["password"]; }  ?>">
    <label for="passwordBis">Répéter mot de passe :</label>
    <input type="password" name="passwordBis" id="passwordBis"
           value="<?php if(isset($_POST["passwordBis"])) { echo $_POST["passwordBis"]; }  ?>">
    <button type="submit" name="submit">S'inscrire</button>
  </div>
</form>