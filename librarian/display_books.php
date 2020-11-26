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
                                <h2>Display Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <form name="form1" action="" method="post" style="margin-bottom: 30px;">
                                <div class="wrapper">
                                  <input type="text" name="t1" class="form-control reg-field" placeholder="enter books name.." style ="display: inline-block; margin: 10px;">
                                  <input type="submit" name="submit1" value="Search" class="btn btn-default" style="display: inline-block; margin: 10px;">
                                  <input type="submit" name="submit2" value="Show all" class="btn btn-default" style="display: inline-block; margin: 10px;">                               
                                </div>
                                
                              </form>

                              <?php
                                  if (isset($_POST["submit1"]))
                                  {
                                    $res = mysqli_query($link, "SELECT*FROM add_books where books_name like('%$_POST[t1]%')" );
                                    echo "<table class='table table-bordered display-books'>";
                                    echo "<tr>";
                                    echo "<th>";  echo "Books Cover";       echo "</th>";
                                    echo "<th>";  echo "Books Name";        echo "</th>";
                                    echo "<th>";  echo "Author Name";       echo "</th>";
                                    echo "<th>";  echo "Publication Name";  echo "</th>";
                                    echo "<th>";  echo "Purchase Date";     echo "</th>";
                                    echo "<th>";  echo "Books Price";       echo "</th>";
                                    echo "<th>";  echo "Books Quantity";    echo "</th>";
                                    echo "<th>";  echo "Available Quantity";echo "</th>";
                                    echo "<th>";  echo "Delete Books";  echo "</th>";
                                    echo "</tr>";
                                    while ($row= mysqli_fetch_array($res))
                                    {
                                      echo "<tr>";
                                      echo "<td>";  ?> <img src="<?php echo $row["books_image"];?>" height="150" width="100"> <?php  echo "</td>";
                                      echo "<td>";  echo $row["books_name"];                                                         echo "</td>";
                                      echo "<td>";  echo $row["books_author_name"];                                                  echo "</td>";
                                      echo "<td>";  echo $row["books_publication_name"];                                             echo "</td>";
                                      echo "<td>";  echo $row["books_purchase_date"];                                                echo "</td>";
                                      echo "<td>";  echo $row["books_price"];                                                        echo "</td>";
                                      echo "<td>";  echo $row["books_qty"];                                                          echo "</td>";
                                      echo "<td>";  echo $row["available_qty"];                                                      echo "</td>";
                                      echo "<td>";  ?> <input type="button" class="btn btn-default" name="delete" value="Delete" onclick="deleteme(<?php echo $row["id"]; ?>)" style="color: white; background-color: red;">

                                      <script language="javascript">
                                        function deleteme(a)
                                        {
                                          <?php $demo = mysqli_query($link, "SELECT id from librarian_registration WHERE username='" . $_SESSION["librarian"] . "'");
                                          if ($demo = 22) 
                                          {?>
                                            alert("You cannot perform this action as a demo user");
                                          <?php } else {?>
                                          if(confirm("Are you sure you want to delete this book?"))
                                          {
                                            window.location.href="delete_books.php?id=<?php echo $row["id"]; ?>";
                                            return true;
                                          } 
                                        <?php }?>
                                        }
                                      </script>

                                      <?php
                                      echo "</tr>";
                                    }
                                      echo "</table>";

                                  }
                                  else
                                  {
                                    $res = mysqli_query($link, "SELECT*FROM add_books");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>";  echo "Books Cover";       echo "</th>";
                                    echo "<th>";  echo "Books Name";        echo "</th>";
                                    echo "<th>";  echo "Author Name";       echo "</th>";
                                    echo "<th>";  echo "Publication Name";  echo "</th>";
                                    echo "<th>";  echo "Purchase Date";     echo "</th>";
                                    echo "<th>";  echo "Books Price";       echo "</th>";
                                    echo "<th>";  echo "Books Quantity";    echo "</th>";
                                    echo "<th>";  echo "Available Quantity";echo "</th>";
                                    echo "<th>";  echo "Delete Books";echo "</th>";
                                    echo "</tr>";
                                    while ($row= mysqli_fetch_array($res))
                                    {
                                      echo "<tr>";
                                      echo "<td>";  ?> <img src="<?php echo $row["books_image"];?>" height="150" width="100"> <?php  echo "</td>";
                                      echo "<td>";  echo $row["books_name"];                                                         echo "</td>";
                                      echo "<td>";  echo $row["books_author_name"];                                                  echo "</td>";
                                      echo "<td>";  echo $row["books_publication_name"];                                             echo "</td>";
                                      echo "<td>";  echo $row["books_purchase_date"];                                                echo "</td>";
                                      echo "<td>";  echo $row["books_price"];                                                        echo "</td>";
                                      echo "<td>";  echo $row["books_qty"];                                                          echo "</td>";
                                      echo "<td>";  echo $row["available_qty"];                                                      echo "</td>";
                                      echo "<td>";  ?> <input type="button" class="btn btn-default" name="delete" value="Delete" onclick="deleteme(<?php echo $row["id"]; ?>)" style="color: white; background-color: red;">
                                      <script language="javascript">
                                        function deleteme(a)
                                        {
                                          <?php $demo = mysqli_query($link, "SELECT id from librarian_registration WHERE username='" . $_SESSION["librarian"] . "'");
                                          if ($demo = 22) 
                                          {?>
                                            alert("You cannot perform this action as a demo user");
                                            window.location.href="display_books.php";
                                          <?php } else {?>
                                            if(confirm("Are you sure you want to delete this book?"))
                                            { 
                                              window.location.href="delete_books.php?id=<?php echo $row["id"]; ?>";
                                              return true;
                                            } <?php } ?>
                                          }                                                                 
                                      </script>
                                      <?php echo "</td>";
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
