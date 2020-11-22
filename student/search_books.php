<?php
session_start();
if (!isset($_SESSION["username"]))
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
                                <h2>Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <form name="form1" action="" method="post">
                                  <table class="table" id="search-books">
                                    <tr>
                                      <div class="wrapper" style="width: 60%;">
                                        <input type="text" name="t1" placeholder="enter book name..." class="form-control reg-field" required style="display: inline-block; margin: 10px;"/>
                                        <input type="submit" name="submit1" value="search books" class="btn btn-default" style="display: inline-block; margin: 10px;">
                                        </div>
                                    </tr>
                                 </table>
                              </form>
                                <?php

                                  if(isset($_POST["submit1"]))
                                  {
                                    $i=0;
                                    $res=mysqli_query($link, "SELECT * FROM add_books WHERE books_name LIKE('%$_POST[t1]%')");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    while ($row=mysqli_fetch_array($res))
                                    {
                                      $i=$i +1;
                                      echo "<td style='width: 50%;'>";
                                      ?><img src="../librarian/<?php echo $row["books_image"]; ?>" height="150" width="100"> <?php
                                      echo "<br />";
                                      echo "<b>".$row["books_name"]."</b>";
                                      echo "<br />";
                                      echo "<b>"."Available: ".$row["available_qty"]."</b>";
                                      echo "</td>";

                                      if ($i==2)
                                      {
                                        echo "</tr>";
                                        echo "<tr>";
                                        $i = 0;
                                      }
                                    }
                                      echo "</tr>";
                                      echo "</table>";
                                  }

                                  else
                                  {
                                    $i=0;
                                    $res=mysqli_query($link, "SELECT * FROM add_books" );
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    while ($row=mysqli_fetch_array($res))
                                    {
                                      $i=$i +1;
                                      echo "<td style='width: 33%;'>";
                                      ?><img src="../librarian/<?php echo $row["books_image"]; ?>" height="150" width="100"> <?php
                                      echo "<br />";
                                      echo "<b>".$row["books_name"]."</b>";
                                      echo "<br />";
                                      echo "<b>"."Available: ".$row["available_qty"]."</b>";
                                      echo "</td>";

                                      if ($i==3)
                                      {
                                        echo "</tr>";
                                        echo "<tr>";
                                        $i = 0;
                                      }
                                    }
                                      echo "</tr>";
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
