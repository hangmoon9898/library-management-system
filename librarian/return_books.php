<?php
session_start();
if (!isset($_SESSION["librarian"]))
{
  ?>
  <script type="text/javascript">
    window.location = "login.php";
  </script>
  <?php
}
  include "header.php";
  include "connection.php";
 ?>
<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            </div>

            <div class="title_right">
                    <div class="input-group">

                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-8 col-sm-8 col-xs-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Return Books</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form name="form1" action="" method="post">
                         
                            <div class="wrapper" style="margin-bottom: 30px;">
                            <select name="enr" class="form-control reg-field" style="display: inline-block;">
                                <?php
                                  $res=mysqli_query($link,"SELECT student_enrollment FROM issue_books WHERE books_return_date=''");
                                  while ($row=mysqli_fetch_array($res))
                                  {
                                      echo "<option>";
                                      echo $row["student_enrollment"];
                                      echo "</option>";
                                  }
                                 ?>
                              </select>
                            
                                <input type="submit" name="submit1" value="Search" class="btn btn-default" style="display: inline-block; margin: 10px -10px 10px 10px;">
                            </div>
                             
                            
                        </form>
                        <?php
                            if (isset($_POST["submit1"]))
                            {
                              $res=mysqli_query($link,"SELECT * FROM issue_books WHERE student_enrollment='$_POST[enr]'");
                              echo "<table class='table table-bordered'>";
                              echo "<tr>";
                              echo "<th>";  echo "Student Enrollment";      echo "</th>";
                              echo "<th>";  echo "Student Name";            echo "</th>";
                              echo "<th>";  echo "Student Sem";             echo "</th>";
                              echo "<th>";  echo "Student Contact";         echo "</th>";
                              echo "<th>";  echo "Student Email";           echo "</th>";
                              echo "<th>";  echo "Books Name";              echo "</th>";
                              echo "<th>";  echo "Books Issue Date";        echo "</th>";
                              echo "<th>";  echo "Return Books";             echo "</th>";
                              echo "</tr>";
                              while ($row=mysqli_fetch_array($res))
                              {
                                  echo "<tr>";
                                  echo "<td>"; echo $row["student_enrollment"];   echo "</td>";
                                  echo "<td>"; echo $row["student_name"];         echo "</td>";
                                  echo "<td>"; echo $row["student_sem"];          echo "</td>";
                                  echo "<td>"; echo $row["student_contact"];      echo "</td>";
                                  echo "<td>"; echo $row["student_email"];        echo "</td>";
                                  echo "<td>"; echo $row["books_name"];           echo "</td>";
                                  echo "<td>"; echo $row["books_issue_date"];     echo "</td>";
                                  echo "<td>"; ?><a href="return.php?id=<?php echo $row["id"];?>" class="btn btn-default">Return</a> <?php     echo "</td>";
                                  echo "</tr>";
                              }
                                echo "</table>";
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


<?php
include "footer.php";
?>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- NProgress -->
<script src="js/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="js/custom.min.js"></script>
</body>
</html>
