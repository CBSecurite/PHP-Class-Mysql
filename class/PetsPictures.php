<?php
class PetsPictures
{
  public function __construct()
  {
  }

  public function __destruct()
  {
  }

  public static function listPetsPictures($md5PetId)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT pp.file FROM pets_pictures as pp 
                         INNER JOIN pets as p ON pp.pets_id = p.id
                         WHERE md5(pets_id) = :md5PetId ORDER BY pp.id DESC");
    $sql->bindParam(":md5PetId", $md5PetId);
    $sql->execute();
    return $sql->fetchAll();
  }
  public static function existPetPicture($md5PictureId)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT id FROM pets_pictures WHERE md5(id) = :md5PetId");
    $sql->bindParam(":md5PetId", $md5PictureId);
    $sql->execute();
    return $sql->fetch();
  }

  public static function editPetsPictures($userId)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT pp.id, p.id as pets_id, p.name, pp.file FROM pets as p 
                         INNER JOIN pets_pictures as pp ON pp.pets_id = p.id
                         WHERE users_id = :usersId ORDER BY p.name ASC, pp.id ASC");
    $sql->bindParam(":usersId", $userId);
    $sql->execute();
    return $sql->fetchAll();
  }

  public static function addPetPicture ($petsId, $file)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("INSERT INTO pets_pictures SET pets_id = :petsId, file = :file");
    $sql->bindParam(":petsId", $petsId);
    $sql->bindParam(":file", $file);
    $sql->execute();
  }

  public static function updateInfoPetPicture ($md5Id, $key, $value)
  {
    echo $md5Id . " | " . $key . " | " . $value . " | " . md5("4");
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("UPDATE pets_pictures SET " . $key . " = :value WHERE md5(id) = :md5Id");
    $sql->bindParam(":value", $value);
    $sql->bindParam(":md5Id", $md5Id);
    $sql->execute();
  }

  public static function deletePetPicture ($md5Id)
  {
    $pdo = StructureWeb::bdd();
    $sql1 = $pdo->prepare("SELECT file FROM pets_pictures WHERE md5(id) = :id");
    $sql1->bindParam(":id", $md5Id);
    $sql1->execute();
    $picture = $sql1->fetch();
    if(is_file("assets/images/pets/" . $picture->file))
    {
      if(unlink("assets/images/pets/" . $picture->file))
      {
        $sql2 = $pdo->prepare("DELETE FROM pets_pictures WHERE md5(id) = :id");
        $sql2->bindParam(":id", $md5Id);
        $sql2->execute();
      }
    }
  }
}
?>