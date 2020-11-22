
<?php
  session_start();
  include "header.php";
  include "connection.php";

  if (!isset($_SESSION["librarian"]))
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
                                <h2>Change User's Password</h2>

                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                              <?php
                                  if (isset($_POST["submit"])) {
                                    $epass = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
                                    mysqli_query($link, "UPDATE student_registration SET password='" . $epass . "' WHERE enrollment=" . $_POST['enr']);
                                    $message = "Password Changed";
                                  }
                              ?>

                              <script>
                              function validatePassword() {
                              var newPassword,confirmPassword,output = true;


                              newPassword = document.frmChange.newPassword;
                              confirmPassword = document.frmChange.confirmPassword;


                              if(!newPassword.value) {
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
                                          
                                                  <select name="enr" class="form-control" style="margin-bottom: 10px;"required>
                                                    <?php
                                                      echo "<option value='' disabled='' selected='' >Select a student</option>";
                                                      $res=mysqli_query($link, "SELECT enrollment, firstname FROM student_registration");
                                                      while ($row=mysqli_fetch_array($res))
                                                      {
                                                        echo "<option value='". $row["enrollment"]. "'>" . $row["enrollment"] . " | " . $row["firstname"] . "</option>";
                                                      }
                                                     ?>
                                                  </select>
                                                
                                              <div>

                                                <input type="password" name="newPassword" placeholder="New Password" class="input-field"/>
                                                <span id="newPassword" class="required"></span>

                                                <input type="password" name="confirmPassword" placeholder="Confirm Password" class="input-field"/>
                                                <span id="confirmPassword"class="required"></span>
                                            
                                              </div>
                                              
                                              
                                              
                                                <input type="submit" name="submit" value="Submit" class="form-control btn btn-default" style="float: right; margin-top: 30px;">
                                              
                                         
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
