<?php
$petsCategory = PetsCategory::listCategory();
?>
<form method="post" action="?page=my-pets&action=add">
  <div class="form">
    <div class="group">
      <label for="category">Catégorie :</label>
      <select name="category" id="category">
        <?php
        $catActive = 0;
        foreach ($petsCategory as $category)
        {
          if(isset($_POST["ajouter"]) && isset($_POST["category"]) && $category->name === $_POST["category"])
          {
            echo '<option value="' . $category->name . '" selected="selected">' . $category->name . '</option>';
          }
          else
          {
            echo '<option value="' . $category->name . '">' . $category->name . '</option>';
          }
        }
        ?>
      </select>
    </div>
    <div class="group">
      <label for="name">Nom :</label>
      <input type="text" name="name" id="name"
           value="<?php if(isset($_POST["ajouter"]) && isset($_POST["name"])) { echo $_POST["name"]; } ?>">
    </div>
    <div class="group">
      <label for="age">Age :</label>
      <div class="groupRow">
        <input type="text" name="age" id="age" maxlength="2"
               value="<?php if(isset($_POST["ajouter"]) && isset($_POST["age"])) { echo $_POST["age"]; } ?>">
        <select name="ageUnit">
          <option value="mois"
            <?php if(isset($_POST["ajouter"]) && isset($_POST["ageUnit"]) && $_POST["ageUnit"] === "mois")
            { echo " selected='selected'"; } ?>>Mois</option>
          <option value="annee"
            <?php if(isset($_POST["ajouter"]) && isset($_POST["ageUnit"]) && $_POST["ageUnit"] === "annee")
            { echo " selected='selected'"; } ?>>Année</option>
        </select>
      </div>
    </div>
    <div class="groupRow">
      <button type="submit" name="ajouter">Ajouter</button>
    </div>
  </div>
</form>