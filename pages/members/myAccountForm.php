<div class="myAccount">
  <div class="header">
    <img src="assets/images/myAccount.png">
    <div class="info">
      <h1>Mon compte</h1>
    </div>
  </div>
  <form method="post" action="?page=my-account">
    <div class="title">Informations personnelles</div>
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
    <section>
      <img src="assets/images/account.png" alt="Mon compte">
      <div class="form">
        <label for="lastName">Nom :</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo $userInfos->last_name; ?>">
        <label for="firstName">Prénom :</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo $userInfos->first_name; ?>">
        <label for="login">Identifiant :</label>
        <input type="text" name="login" id="login" value="<?php echo $userInfos->login; ?>">
        <label for="email">Adresse email :</label>
        <input type="email" name="email" id="email" value="<?php echo $userInfos->email; ?>">
        <button type="submit" name="changeInfos">Modifier mes informations</button>
      </div>
    </section>
  </form>
  <form method="post" action="?page=my-account">
    <div class="title">Mot de passe</div>
    <?php
    if(isset($errorsPassword) && count($errorsPassword)){
      echo "<div class='msgPassword error'><h4>Erreurs :</h4><ul>";
      foreach($errorsPassword as $value)
      {
        echo "<li>" . $value . "</li>";
      }
      echo "</ul></div>";
    }
    if(isset($msgValidPassword))
    {
      echo "<div class='msgInfo valid'><h4>" . $msgValidPassword . "</h4></div>";
    }
    ?>
    <section>
      <div class="form">
        <label for="password">Ancien mot de passe :</label>
        <input type="password" name="password" id="password"
               value="<?php if(isset($_POST["password"])) { echo $_POST["password"]; }  ?>">
        <label for="newPassword">Nouveau mot de passe :</label>
        <input type="password" name="newPassword" id="newPassword"
               value="<?php if(isset($_POST["newPassword"])) { echo $_POST["newPassword"]; }  ?>">
        <label for="newPasswordBis">Répéter mot de passe :</label>
        <input type="password" name="newPasswordBis" id="newPasswordBis"
               value="<?php if(isset($_POST["newPasswordBis"])) { echo $_POST["newPasswordBis"]; }  ?>">
        <button type="submit" name="changePassword">Changer le mot de passe</button>
      </div>
      <img src="assets/images/password.png" alt="Mot de passe">
    </section>
  </form>
</div>


