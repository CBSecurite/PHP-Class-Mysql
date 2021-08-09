<?php

class Pets
{
  public function __construct ()
  {
  }

  public function __destruct ()
  {
  }

  public static function myPets ($userId)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT pc.name as category, p.name, 
                         CONCAT(p.age, ' ', IF(p.age_unit = 'annee' AND p.age > 1, 'ans', IF(p.age_unit = 'mois', 'mois', 'an'))) as age, p.id 
                         FROM pets as p INNER JOIN pets_category as pc ON pc.id = pets_category_id 
                         WHERE users_id = :id ORDER BY id DESC");
    $sql->bindParam(":id", $userId);
    $sql->execute();
    return $sql->fetchAll();
  }

  public static function listPets ($userId)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT pc.name as category, p.name, 
                         CONCAT(p.age, ' ', IF(p.age_unit = 'annee' AND p.age > 1, 'ans', IF(p.age_unit = 'mois', 'mois', 'an'))) as age, p.id 
                         FROM pets as p INNER JOIN pets_category as pc ON pc.id = pets_category_id 
                         WHERE md5(users_id) = :id ORDER BY id DESC");
    $sql->bindParam(":id", $userId);
    $sql->execute();
    return $sql->fetchAll();
  }

  public static function editPets ($petId)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT pc.id as category_id, pc.name as category_name, p.name, p.age, p.age_unit, p.id
                         FROM pets as p INNER JOIN pets_category as pc ON pc.id = p.pets_category_id
                         WHERE md5(p.id) = :petId");
    $sql->bindParam(":petId", $petId);
    $sql->execute();
    return $sql->fetch();
  }

  public static function deletePets ($petId)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("DELETE FROM pets WHERE md5(id) = :id");
    $sql->bindParam(":id", $petId);
    $sql->execute();
  }

  public static function addPets ($userId, $petCategoryName, $name, $age, $ageUnit)
  {
    $pdo = StructureWeb::bdd();
    $sqlCat = $pdo->prepare("SELECT id FROM `pets_category` WHERE name = :name");
    $sqlCat->bindParam(":name", $petCategoryName);
    $sqlCat->execute();
    $petCategory = $sqlCat->fetch();
    $sql = $pdo->prepare("INSERT INTO pets
                         SET users_id = :userId, pets_category_id = :petCategoryId, name = :name, age = :age, age_unit = :ageUnit");
    $sql->bindParam(":userId", $userId);
    $sql->bindParam(":petCategoryId", $petCategory->id);
    $sql->bindParam(":name", $name);
    $sql->bindParam(":age", $age);
    $sql->bindParam(":ageUnit", $ageUnit);
    $sql->execute();
  }

  public static function updateInfoPets ($userId, $petId, $key, $value)
  {
    $pdo = StructureWeb::bdd();
    $setKey = $key;
    $setValue = $value;
    if($key === 'category')
    {
      $sqlCat = $pdo->prepare("SELECT id FROM `pets_category` WHERE name = :name");
      $sqlCat->bindParam(":name", $value);
      $sqlCat->execute();
      $petCategory = $sqlCat->fetch();
      if($petCategory)
      {
        $setKey = "pets_category_id";
        $setValue = $petCategory->id;
      }
      else
      {
        return false;
      }
    }
    $sql = $pdo->prepare("UPDATE  pets SET " . $setKey . " = :value WHERE users_id = :userId AND md5(id) = :id");
    $sql->bindParam(":userId", $userId);
    $sql->bindParam(":id", $petId);
    $sql->bindParam(":value", $setValue);
    $sql->execute();
    return true;
  }
}
?>