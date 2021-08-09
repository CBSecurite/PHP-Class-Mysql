<?php
class PetsCategory
{
  public function __construct()
  {
  }

  public function __destruct()
  {
  }

  public static function listCategory ()
  {

    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT name FROM pets_category ORDER BY name ASC");
    $sql->execute();
    return $sql->fetchAll();
  }

  public static function idCategory ($name)
  {

    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT id FROM pets_category WHERE name = :name");
    $sql->bindParam(":name", $name);
    if($sql->execute())
    {
      return $sql->fetch();
    }
    return false;
  }
}
?>