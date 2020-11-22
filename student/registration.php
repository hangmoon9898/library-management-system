<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Registration Form </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/book.png" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>

<br>



<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper reg_wrapper">
        <div class="text-center form-heading" style="margin-top: 0;">
            <h1>Hamoli</h1>
        </div>
        <br>

        <section class="login_content" style="margin-top: -40px;">
            <form name="form1" action="" method="post">
                <h3>Student Registration</h3><br><br>

                <div>
                    <input type="text" class="reg-field" placeholder="First Name" name="firstname" required="" />
                </div>
                <div>
                    <input type="text" class="reg-field" placeholder="Last Name" name="lastname" required="" />
                </div>

                <div>
                    <input type="text" class="reg-field" placeholder="Username" name="username" required="" />
                </div>
                <div>
                    <input type="password" class="reg-field" placeholder="Password" name="password" required="" />
                </div>
                <div>
                    <input type="email" class="reg-field" placeholder="Email" name="email" required="" />
                </div>
                <div>
                    <input type="tel" class="reg-field" placeholder="Phone Number" name="contact" required="" />
                </div>
                <div>
                    <input type="number" class="reg-field" placeholder="Student Number" name="enrollmentno" required="" />
                </div>
                <div>
                    <input class="button-submit" type="submit" name="submit1" value="Register">
                </div>



            </form>
        </section>

        <?php
        if (isset($_POST["submit1"])) {
            $epass = password_hash($_POST["password"], PASSWORD_DEFAULT);
            mysqli_query($link, "INSERT INTO student_registration VALUES('','$_POST[firstname]','$_POST[lastname]','$_POST[username]','$epass','$_POST[email]','$_POST[contact]','', '$_POST[enrollmentno]','no')");
        ?>
            <div class="alert alert-success col-lg-12" style="text-align: center;">
                Registration successful! You will get an email when your account is approved.
                <br>
                Go back to <a href="https://lehang.pw/library/container/student/login.php">Login</a>
            </div>
        <?php
        }
        ?>

    </div>
</body>

</html>