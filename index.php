<?php
require_once("layout/sessionStart.php");
require_once ("class/StructureWeb.php");
require_once ("class/Users.php");
require_once ("class/Pets.php");
require_once ("class/PetsCategory.php");
require_once ("class/PetsPictures.php");
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <?php
    StructureWeb::getCss("base");
    if(isset($_GET["page"]))
    {
      StructureWeb::getCss($_GET["page"]);
    }
    ?>
    <title>Evaluation</title>
  </head>
  <body>
    <?php
    $structureWeb = new StructureWeb();
    ?>
  </body>
</html>