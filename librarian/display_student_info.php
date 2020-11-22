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
  include "connection.php";
  include "header.php";
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
                                <h2>Students Information</h2>
                                <div class="clearfix"></div>
                              </div>

                            <div class="x_content">
                              <?php
                                $res = mysqli_query($link, "SELECT * FROM student_registration");
                                echo "<table class ='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "First name";  echo "</th>";
                                echo "<th>"; echo "Last name";   echo "</th>";
                                echo "<th>"; echo "Username";   echo "</th>";
                                echo "<th>"; echo "Email";      echo "</th>";
                                echo "<th>"; echo "Contact";    echo "</th>";
                                echo "<th>"; echo "Student Number"; echo "</th>";
                                echo "<th>"; echo "Status";     echo "</th>";
                                echo "<th>"; echo "Approve";    echo "</th>";
                                echo "<th>"; echo "Not Approve";echo "</th>";
                                echo "</tr>";

                                while($row=mysqli_fetch_array($res))
                                {
                                  echo "<tr>";
                                  echo "<td>"; echo $row["firstname"];  echo "</td>";
                                  echo "<td>"; echo $row["lastname"];   echo "</td>";
                                  echo "<td>"; echo $row["username"];   echo "</td>";
                                  echo "<td>"; echo $row["email"];      echo "</td>";
                                  echo "<td>"; echo $row["contact"];    echo "</td>";
                                  echo "<td>"; echo $row["enrollment"]; echo "</td>";
                                  echo "<td>"; echo $row["status"];     echo "</td>";
                                  echo "<td>"; ?> <a class='btn btn-default' style='background-color: #4FD964;' href="approve.php?id=<?php echo $row["id"]; ?>">Approve</a> <?php    echo "</td>";
                                  echo "<td>"; ?> <a class='btn btn-default' style='background-color: red;' href="notapprove.php?id=<?php echo $row["id"]; ?>">Not Approve</a> <?php    echo "</td>";
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
