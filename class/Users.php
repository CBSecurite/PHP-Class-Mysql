<?php

class Users
{
  public function __construct ()
  {
  }

  public function __destruct ()
  {
  }

  public static function registration ($lastName, $firstname, $login, $email, $password)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("INSERT INTO users (last_name, first_name, login, email, password)
                         values (:lastName, :firstname, :login, :email, :password)");
    $sql->bindParam(":lastName", $lastName);
    $sql->bindParam(":firstname", $firstname);
    $sql->bindParam(":login", $login);
    $sql->bindParam(":email", $email);
    $sql->bindParam(":password", $password);
    $sql->execute();
  }

  public static function controlExist ($key, $value)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT * FROM users WHERE " . $key . " = :value");
    $sql->bindParam(":value", $value);
    $sql->execute();
    if($sql->fetch())
    {
      return true;
    }
    return false;
  }

  public static function connexion ($email, $password)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    $sql->bindParam(":email", $email);
    $sql->bindParam(":password", $password);
    $sql->execute();
    $req = $sql->fetchAll();
    if(count($req))
    {
      $userInfo = [];
      foreach($req as $res)
      {
        foreach($res as $k => $v)
        {
          $userInfo[$k] = $v;
        }
      }
      return $userInfo;
    }
    return false;
  }

  public static function userInfos ($id)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $sql->bindParam(":id", $id);
    $sql->execute();
    return $sql->fetch();
  }

  public static function changeValue ($id, $key, $value)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("UPDATE users SET " . $key . " = :value WHERE id = :id");
    $sql->bindParam(":value", $value);
    $sql->bindParam(":id", $id);
    $sql->execute();
  }

  public static function updateInfos ($lastName, $firstname, $login, $email, $password)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("INSERT INTO users (last_name, first_name, login, email, password)
                         values (:lastName, :firstname, :login, :email, :password)");
    $sql->bindParam(":lastName", $lastName);
    $sql->bindParam(":firstname", $firstname);
    $sql->bindParam(":login", $login);
    $sql->bindParam(":email", $email);
    $sql->bindParam(":password", $password);
    $sql->execute();
  }

  public static function lookingForProfile ($value)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT id, last_name, first_name, login FROM users WHERE last_name like :value OR login like :value");
    $sql->bindParam(":value", $value);
    $sql->execute();
    $req = $sql->fetchAll();
    if(count($req))
    {
      return $req;
    }
    return false;
  }

  public static function userProfile ($id)
  {
    $pdo = StructureWeb::bdd();
    $sql = $pdo->prepare("SELECT id, last_name, first_name, login, email FROM users WHERE md5(id) = :id");
    $sql->bindParam(":id", $id);
    $sql->execute();
    return $sql->fetch();
  }
}
?>