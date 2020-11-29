<?php
include "connection.php";
$id = $_GET["id"];
if ($id == 15) { ?>
   <script>
      alert("You cannot change the student status for the demo user.");
      window.location = "display_student_info.php";
   </script>
<?php }
else {
   mysqli_query($link, "update student_registration set status='no' where id=$id");
}
?>

<script type=text/javascript> window.location="display_student_info.php" ; </script>