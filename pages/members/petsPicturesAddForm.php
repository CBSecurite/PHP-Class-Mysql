<?php
$pets = Pets::listPets(md5($_SESSION["userId"]));
?>
<form method="post" enctype="multipart/form-data" action="?page=pets-pictures&action=add">
  <div class="form">
    <div class="group">
      <label for="petsName">Mon animal :</label>
      <select name="petsName" id="petsName">
        <?php
        $catActive = 0;
        foreach ($pets as $pet)
        {
          if(isset($_POST["ajouter"]) && isset($_POST["petsName"]) && $pet->name === $_POST["petsName"])
          {
            echo '<option value="' . $pet->id . '" selected="selected">' . $pet->name . '</option>';
          }
          else
          {
            echo '<option value="' . $pet->id . '">' . $pet->name . '</option>';
          }
        }
        ?>
      </select>
    </div>
    <div class="group">
      <label for="picture">Fichier :</label>
      <div class="groupRow">
        <input type="file" name="picture" id="picture">
      </div>
    </div>
    <div class="groupRow">
      <button type="submit" name="ajouter">Ajouter</button>
    </div>
  </div>
</form>