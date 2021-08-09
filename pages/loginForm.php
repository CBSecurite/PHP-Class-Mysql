<form class="login" method="post" action="?page=login">
  <div class="title">Connexion</div>
  <div class="form">
    <?php
    if(isset($errors) && count($errors)){
      echo "<div class='msgInfo error'><h4>Erreurs connexion :</h4><ul>";
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
    <label for="email">Adresse email :</label>
    <input type="email" name="email" id="email"
           value="<?php if(isset($_POST["email"])) { echo $_POST["email"]; }  ?>">
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password"
           value="<?php if(isset($_POST["password"])) { echo $_POST["password"]; }  ?>">
    <button type="submit" name="submit">Se connecter</button>
  </div>
</form>