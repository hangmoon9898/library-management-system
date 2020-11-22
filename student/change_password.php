
<?php
  session_start();
  include "header.php";
  include "connection.php";

  if (!isset($_SESSION["username"]))
  {
    ?>
    <script type="text/javascript">
      window.location = "login.php";
    </script>
    <?php
  }
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
                                <h2>Change Password</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <?php


                              if (count($_POST) > 0) {
                                  $result = mysqli_query($link, "SELECT *from student_registration WHERE username='" . $_SESSION["username"] . "'");
                                  $row = mysqli_fetch_array($result);
                                  if ($_POST["currentPassword"] == $row["password"]) {
                                      mysqli_query($link, "UPDATE student_registration set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["username"] . "'");
                                      $message = "Password Changed";
                                  } else
                                      $message = "Current Password is not correct";
                              }
                              ?>




                              <script>
                              function validatePassword() {
                              var currentPassword,newPassword,confirmPassword,output = true;

                              currentPassword = document.frmChange.currentPassword;
                              newPassword = document.frmChange.newPassword;
                              confirmPassword = document.frmChange.confirmPassword;

                              if(!currentPassword.value) {
                                currentPassword.focus();
                                document.getElementById("currentPassword").innerHTML = "required";
                                output = false;
                              }
                              else if(!newPassword.value) {
                                newPassword.focus();
                                document.getElementById("newPassword").innerHTML = "required";
                                output = false;
                              }
                              else if(!confirmPassword.value) {
                                confirmPassword.focus();
                                document.getElementById("confirmPassword").innerHTML = "required";
                                output = false;
                              }
                              if(newPassword.value != confirmPassword.value) {
                                newPassword.value="";
                                confirmPassword.value="";
                                newPassword.focus();
                                document.getElementById("confirmPassword").innerHTML = "not same";
                                output = false;
                              }
                              return output;
                              }
                              </script>


                                  <form name="frmChange" method="post" action=""
                                      onSubmit="return validatePassword()">
                                      <div style="width: 250px;">
                                          <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
 
                                                  <input type="password"
                                                      name="currentPassword" class="input-field" placeholder="Current Password"/><span
                                                      id="currentPassword" class="required"></span>
             
                                                  <input type="password" name="newPassword"
                                                      class="input-field" placeholder="New Password"/><span id="newPassword"
                                                      class="required"></span>

                                              <input type="password" name="confirmPassword"
                                                  class="input-field" placeholder="Confirm Password"/><span id="confirmPassword"
                                                  class="required"></span>
                                                                                      
                                                  <input type="submit" name="submit"
                                                      value="Submit" class="btn btn-default" style="margin-top: 30px; float: right;">                                           
                                      </div>
                                  </form>



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
