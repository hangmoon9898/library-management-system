
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Students Record Of This Book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                  $res=mysqli_query($link, "SELECT * FROM issue_books WHERE books_name='$_GET[books_name]'&& books_return_date=''");
                                  echo "<table class='table table-bordered'>";
                                  echo "<tr>"; echo "Books Name: "; echo "</tr>";
                                  echo "<tr>";
                                  echo "<th>"; echo "Student Name";       echo "</th>";
                                  echo "<th>"; echo "Student Enrollment"; echo "</th>";
                                  echo "<th>"; echo "Student Email";      echo "</th>";
                                  echo "<th>"; echo "Student Contact";    echo "</th>";
                                  echo "<th>"; echo "Books Issue Date";   echo "</th>";
                                  echo "</tr>";
                                  
                                  echo "<tr>"; echo "<b>".$_GET["books_name"]."</b>"; echo "</tr>";
                                  echo "<br />";
                                  echo "<br />";

                                  while ($row=mysqli_fetch_array($res))
                                  {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["student_name"]; echo "</td>";
                                    echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
                                    echo "<td>"; echo $row["student_email"]; echo "</td>";
                                    echo "<td>"; echo $row["student_contact"]; echo "</td>";
                                    echo "<td>"; echo $row["books_issue_date"]; echo "</td>";
                                    echo "</tr>";
                                  }
                                  echo "</table>";
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
