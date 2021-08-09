<div class="resultLookingFor">
  <?php
  if(isset($_POST["lookingForSubmit"])
    && isset($_POST["lookingFor"]))
  {
    $req = Users::lookingForProfile($_POST["lookingFor"]);
    if(!$req)
    {
      echo "<div class='text'><strong>0</strong> recherche(s) trouvée(s) pour : \"" . $_POST["lookingFor"] . "\"</div>";
      echo "<ul>";
      echo "<li>Aucune recherche trouvée pour le nom.</li>";
      echo "<li>Aucune recherche trouvée pour l'identifiant.</li>";
      echo "</ul>";
    }
    else
    {
      echo "<div class='text'><strong>" . count($req) . "</strong> recherche(s) trouvée(s) pour : \""
           . $_POST["lookingFor"] . "\"</div>";
      echo "<ul>";
      $list1 = 0;
      foreach ($req as $result)
      {
        if(strtoupper($_POST["lookingFor"]) === strtoupper($result->last_name))
        {
          echo "<li>";
          echo "<a href='?page=profile&id=" . md5($result->id) . "'>" . strtoupper($result->last_name) .
               " (" . $result->login  . ")</a>";
          echo "</li>";
          $list1++;
        }
      }
      $list2 = 0;
      foreach ($req as $result1)
      {
        if(strtoupper($_POST["lookingFor"]) === strtoupper($result1->login))
        {
          echo "<li>";
          echo "<a href='?page=profile&id=" . md5($result1->id)  . "'>" . $result1->login
               . " (" . strtoupper($result1->last_name)  . ")</a>";
          echo "</li>";
          $list2++;
        }
      }
      echo "</ul>";
    }
  }
  ?>
</div>
