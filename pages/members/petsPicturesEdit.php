<div class="block">
  <div class="img">
    <?php
    echo '<strong>' . $petsPicture->name . '</strong>';
    ?>
    <img class="imgPetsPicture" src="assets/images/pets/<?php echo $petsPicture->file; ?>">
    <div class="groupRow">
      <a href="?page=pets-pictures&action=delete&id=<?php echo md5($petsPicture->id); ?>">
        <button class="delete" type="submit">Supprimer</button>
      </a>
    </div>
  </div>
</div>