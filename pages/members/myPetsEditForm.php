<?php
$myPet = Pets::editPets(md5($pets->id));
$petsCategory = PetsCategory::listCategory();
?>
<form method="post" action="?page=my-pets&action=edit&id=<?php echo md5($myPet->id); ?>">
  <div class="form">
    <div class="group">
      <select name="category" id="category">
        <?php
        $catActive = 0;
        foreach ($petsCategory as $category)
        {
          if($category->name === $myPet->category_name)
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
    <input type="text" name="name" id="name" value="<?php echo $myPet->name; ?>">
    </div>
    <div class="group">
      <div class="groupRow">
        <input type="text" name="age" id="age" maxlength="2" value="<?php echo $myPet->age; ?>">
        <select name="ageUnit">
          <option value="mois" <?php if($myPet->age_unit === "mois") { echo "selected='selected'"; } ?>>Mois</option>
          <option value="annee" <?php if($myPet->age_unit === "annee") { echo "selected='selected'"; } ?>>Année</option>
        </select>
      </div>
    </div>
    <div class="groupRow">
      <button type="submit" name="changeInfos">Modifier</button>
      <a href="?page=my-pets&action=delete&id=<?php echo md5($myPet->id); ?>">
        <button class="delete" type="button">Supprimer</button>
      </a>
    </div>
  </div>
</form>