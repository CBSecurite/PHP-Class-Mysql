<header>
  <?php
  if(!isset($_SESSION["userId"]))
  {
  ?>
    <ul>
      <li>
        <a href="?page=login"
          <?php if(isset($_GET["page"]) && $_GET['page'] === "login") { echo 'class="actif"'; } ?>>Connexion</a>
      </li>
      <li>
        <a href="?page=registration"
          <?php if(isset($_GET["page"]) && $_GET['page'] === "registration") { echo 'class="actif"'; } ?>>Inscription</a>
      </li>
    </ul>
  <?php
  }
  else
  {
  ?>
  <ul>
    <li>
      <a href="?page=profile&id=<?php echo md5($_SESSION["userId"]); ?>"
        <?php if(isset($_GET["page"]) && $_GET['page'] === "profile") { echo 'class="actif"'; } ?>>Profil</a>
    </li>
    <li>
      <a href="?page=my-pets"
        <?php if(isset($_GET["page"]) && $_GET['page'] === "my-pets") { echo 'class="actif"'; } ?>>Mes animaux</a>
    </li>
    <li>
      <a href="?page=pets-pictures"
        <?php if(isset($_GET["page"]) && $_GET['page'] === "pets-pictures") { echo 'class="actif"'; } ?>>Photos animaux</a>
    </li>
    <li>
      <a href="?page=my-account"
        <?php if(isset($_GET["page"]) && $_GET['page'] === "my-account") { echo 'class="actif"'; } ?>>Mon compte</a>
    </li>
    <li>
      <a href="?page=logout">Déconnexion</a>
    </li>
    <?php
    }
    ?>
  </ul>
</header>