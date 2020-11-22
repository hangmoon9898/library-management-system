<form id='fg' method='post'>
  <input type='email' name='email' required>
  <input type='submit' value='submit' name='submit1'>
</form>


<?php
include "connection.php";
if(isset($_POST['submit1'])) {

  if ($link->connect_error) {die('Connect Error (' . $link->connect_errno . ') '. $link->connect_error);}
  $password = rand(999, 99999);
  $pass = md5($password);
  
  $sql =  $sql = "UPDATE `student_registration` SET `password`="."'".$pass."'". "WHERE `email` ="."'". $_POST['email']. "'";
  $to = $_POST['email'];
  $subject = "You requested a new password";
  $message = "Your password has been reset: " . $pass ."<br>
              Make sure to change it afterwards in the settings of your account.";
  $headers = "From : reset@cryck.me";
  if(mail($to, $subject, $message, $headers) && $link->query($sql) === TRUE) {
  	header("Location: login.php");
  } else {
  	echo "Error: " . $sql . "<br>" . $link->error;
  }
}
?>
