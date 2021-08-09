<?php
$userInfos = Users::userProfile($_GET["id"]);
if(isset($_GET["id"]) && $userInfos)
{
  ?>
  <div class="profile">
    <div class="header">
      <img src="assets/images/profil.png">
      <div class="info">
        <h1>Profil</h1>
        <h2><?php echo $userInfos->login; ?></h2>
      </div>
    </div>
    <div class="title">Rechercher un profil</div>
    <form class="lookingFor" method="post" action="?page=profile&id=<?php echo md5($userInfos->id); ?>">
      <input type="text" name="lookingFor" placeholder="Saisir nom ou identifiant ...">
      <button type="submit" name="lookingForSubmit">rechercher</button>
    </form>
    <?php
    if(isset($_POST["lookingForSubmit"]) && isset($_POST["lookingFor"]))
    {
      include ('pages/members/lookingFor.php');
    }
    ?>
    <div class="title">Mes animaux</div>
    <div class="myPets">
      <?php
      $myPets = Pets::listPets($_GET["id"]);
      foreach ($myPets as $pets)
      {
        echo "<h4>" . strtoupper($pets->name) . "</h4>";
        echo '<div class="petList">';
        $petsPitures = PetsPictures::listPetsPictures(md5($pets->id));
        foreach ($petsPitures as $picture)
        {
          echo '<div class="petImgBloc">';
          echo '<img class="petImg" src="assets/images/pets/' . $picture->file . '">';
          echo '</div>';
        }
        echo '</div>';
      }
      ?>
    </div>
  </div>
<?php
}
else
{
  header("Location: ?page=profile&id=" . md5($_SESSION["userId"]));
}
?>
