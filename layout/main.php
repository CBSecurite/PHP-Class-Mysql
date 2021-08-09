<main>
  <?php
  if(isset($_SESSION["userId"]))
  {
    if(isset($_GET["page"]))
    {
      StructureWeb::setPageMembers($_GET["page"]);
      StructureWeb::getPageMembers();
    }
    else
    {
      header("Location: ?page=profile");
    }
  }
  else
  {
    if(isset($_GET["page"]))
    {
      StructureWeb::setPage($_GET["page"]);
      StructureWeb::getPage();
    }
    else
    {
      header("Location: ?page=login");
    }
  }
  ?>
</main>
