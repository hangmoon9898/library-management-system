<?php
  include "connection.php";

  if (isset($_GET["id"]))
  {
    $id = $_GET["id"];
    mysqli_query($link, "DELETE FROM add_books WHERE id=$id");
   ?>
   <script type="text/javascript">
     window.location = "display_books.php";
   </script>
  <?php
  }
  else
  {
    ?>
    <script type="text/javascript">
      window.location = "display_books.php";
    </script>
    <?php
}
      ?>
