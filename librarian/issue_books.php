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
                  <div class="col-md-6 col-sm-6 col-xs-6">
                      <div class="x_panel">
                          <div class="x_title">
                              <h2>Issue Books</h2>

                              <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <form name="form1" action="" method="post">
                              
                                 <div class="wrapper">
                                    <select name="enr" class="form-control reg-field" style="display: inline-block; padding: 0 0 0 10px; ">
                                      <?php
                                        $res=mysqli_query($link, "SELECT enrollment FROM student_registration");
                                        while ($row=mysqli_fetch_array($res))
                                        {
                                          echo "<option>";
                                          echo $row["enrollment"];
                                          echo "</option>";
                                        }
                                       ?>
                                    </select>
                                  

                                 
                                    <input type="submit" class="btn btn-default"value="Search" name="submit1" class="form-control reg-field" style="display: inline-block; margin: 10px -10px 10px 10px;">
                                    </div>

                              <?php
                                if (isset($_POST["submit1"]))
                                {
                                  $res5 = mysqli_query($link, "SELECT * FROM student_registration WHERE enrollment=" . $_POST['enr']);
                                  while ($row5=mysqli_fetch_array($res5))
                                  {
                                    $firstname=$row5["firstname"];
                                    $lastname=$row5["lastname"];
                                    $username=$row5["username"];
                                    $email=$row5["email"];
                                    $contact=$row5["contact"];
                                    $sem=$row5["sem"];
                                    $enrollment=$row5["enrollment"];
                                    $_SESSION["enrollment"]=$enrollment;
                                    $_SESSION["studentusername"]=$username;
                                  }
                                }
                               ?>


                            </form>
                            <?php
                              if (isset($_POST["submit1"]))
                              {
                                ?>
                                <form name="form2" action="" method="post">
                                
                                  
                                    <input type="text" class="form-control reg-field"value="<?php echo $enrollment;?>" name ="enrollmentno" placeholder="enrollment no" disabled> 
                                  

                                  
                                    <input type="text" class="form-control reg-field" value="<?php echo $firstname.' '.$lastname;?>"name ="studentname" placeholder="student name" required> 
                                  

                                    <input type="text" class="form-control reg-field" value="<?php echo $contact;?>" name ="studentcontact" placeholder="phone number" required> 
                                  

                                  
                                    <input type="text" class="form-control reg-field" value="<?php echo $email;?>" name ="studentemail" placeholder="student email" required> 
                                  

                                  
                                    
                                        <select name="booksname" class="form-control reg-field selectpicker" style = "padding: 0 0 0 10px;"> 
                                          <?php
                                            $res=mysqli_query($link, "SELECT books_name FROM add_books");
                                            while ($row=mysqli_fetch_array($res))
                                            {
                                              echo "<option>";
                                              echo $row["books_name"];
                                              echo "</option>";
                                            }
                                           ?>
                                        </select>
                                     
                                  
                                  
                                    <input type="text" class="form-control reg-field" value="<?php echo date("d-m-Y");?>" name ="bookissuedate" placeholder="book issue date" required> 
                                  

                                  <!-- 
                                    <input type="text" class="form-control reg-field" name="bookreturndate" placeholder="book return date" required> 
                                   -->

                                  
                                    <input type="text" class="form-control reg-field" value="<?php echo $username;?>" name ="studentusername" placeholder="student username" disabled> 
                                  

                                  
                                    
                                      <input type="submit" name="submit2" value="Issue Books" class="btn btn-default" style="float: right; margin-right: -10px;">
                                    
                                  
                                </form>


                                <?php
                              }
                            ?>

                            <?php
                              if (isset($_POST["submit2"]))
                              {
                                $qty=0;
                                $res=mysqli_query($link, "SELECT * FROM add_books WHERE books_name='$_POST[booksname]'");
                                while ($row=mysqli_fetch_array($res))
                                {
                                  $qty=$row["available_qty"];
                                }
                                if ($qty==0)
                                {
                                  ?>
                                  <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                      <strong style="color:white; align-items:  center;">Not available in stock</strong>.
                                  </div>
                                <?php
                                }
                                else
                                {
                                  mysqli_query($link, "INSERT INTO issue_books VALUES('', '{$_SESSION[enrollment]}','{$_POST[studentname]}','{$_POST[studentsem]}','{$_POST[studentcontact]}','{$_POST[studentemail]}','{$_POST[booksname]}','{$_POST[bookissuedate]}','','{$_SESSION[studentusername]}')");
                                  mysqli_query($link, "UPDATE add_books SET available_qty=available_qty-1 WHERE books_name='$_POST[booksname]'");
                                  ?>
                                  <script type="text/javascript">
                                    alert("Books issued successfully!");
                                    window.location.href=window.location.href;
                                  </script>

                              <?php
                                }
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
