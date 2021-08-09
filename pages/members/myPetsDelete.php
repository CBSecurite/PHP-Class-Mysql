<?php
Pets::deletePets($_GET["id"]);
header("Location: ?page=my-pets");
?>