<?php

class StructureWeb
{
  public static $_page = 'login.php';
  private static $_host = "localhost";
  private static $_login = "root";
  private static $_password = "";
  private static $_base = "itakademy1";

  public function __construct()
  {
    $this->getHeader();
    $this->getMain();
  }

  public function __destruct()
  {
  }

  public static function bdd ()
  {
    try
    {
      $pdo = new PDO("mysql:host=" . self::getHost() . ";dbname=" . self::getBase() .
        ";charset=utf8mb4", self::getLogin(), self::getPassword());
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      return $pdo;
    }
    catch (PDOException $e)
    {
      $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
      die($msg);
    }
  }

  public function getHeader()
  {
    include ('layout/header.php');
  }

  public function getMain()
  {
    include ("layout/main.php");
  }

  public static function getPage()
  {
    if(is_file('pages/' . self::$_page))
    {
      include ('pages/' . self::$_page);
    }
    else
    {
      header("Location: ?page=login");
    }
  }

  public static function setPage($page)
  {
    $tabPage = explode("-", $page);
    $vuPage = "";
    $i = 0;
    foreach($tabPage as $value)
    {
      if($i === 0)
      {
        $vuPage .= strtolower($value);
      }
      else
      {
        $vuPage .=  ucfirst(strtolower($value));
      }
    }
    if(is_file("pages/" . $vuPage . ".php"))
    {
      self::$_page = $vuPage . ".php";
    }
    else
    {
      self::$_page = "login.php";
    }
  }

  public static function getPageMembers()
  {
    if(is_file('pages/members/' . self::$_page))
    {
      include ('pages/members/' . self::$_page);
    }
    else
    {
      header("Location: ?page=profile");
    }
  }

  public static function setPageMembers($page)
  {
    $tabPage = explode("-", $page);
    $vuPage = "";
    $i = 0;
    foreach($tabPage as $value)
    {
      if($i === 0)
      {
        $vuPage .= strtolower($value);
      }
      else
      {
        $vuPage .=  ucfirst(strtolower($value));
      }
    }
    if(is_file("pages/members/" . $vuPage . ".php"))
    {
      self::$_page = $vuPage . ".php";
    }
    else
    {
      self::$_page = "profile.php";
    }
  }

  public static function getCss($css)
  {
    $tabCss = explode("-", $css);
    $vuCss = "";
    $i = 0;
    foreach($tabCss as $value)
    {
      if($i === 0)
      {
        $vuCss .= strtolower($value);
      }
      else
      {
        $vuCss .=  ucfirst(strtolower($value));
      }
    }
    if(is_file("assets/css/" . $vuCss . ".css"))
    {
      echo '<link rel="stylesheet" href="assets/css/' . $vuCss . '.css">';
    }
  }

  public static function getHost()
  {
    return self::$_host;
  }

  public static function getLogin()
  {
    return self::$_login;
  }

  public static function getPassword()
  {
    return self::$_password;
  }

  public static function getBase()
  {
    return self::$_base;
  }
}
?>