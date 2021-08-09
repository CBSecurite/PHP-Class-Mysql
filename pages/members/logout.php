<?php
unset($_SESSION["userId"]);
header("Location: ?page=login");
?>