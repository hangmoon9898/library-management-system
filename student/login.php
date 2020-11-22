<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://use.fontawesome.com/b84197464f.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/book.png" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>

<br>

<br>

<body class="login">


    <div class="login_wrapper login_only">
        <div class="text-center form-heading heading-space">
            <h1>Hamoli</h1>
        </div>
        <section class="login_content">
            <form name="form1" action="" method="post">
                <div class="user-icon">
                    <img src="images/user-icon.png" alt="admin-icon" height="80px" width="60px">
                </div>

                <div class="input-container">
                    <i class="fas fa-user icon"></i>
                    <input type="text" name="username" class="input-field" placeholder="Username" required="" />
                </div>
                <div class="input-container">
                    <i class="fas fa-lock icon"></i>
                    <input type="password" name="password" class="input-field" placeholder="Password" required="" />
                </div>
                <div>
                    <input class="button-submit" type="submit" name="submit1" value="Log in">
                </div>


                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">New to site?
                        <a href="registration.php"> Create Account </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />


                </div>
            </form>
        </section>
    </div>

    <?php
    if (isset($_POST["submit1"])) {
        $count = 0;
        $res = mysqli_query($link, "SELECT password FROM student_registration WHERE username='$_POST[username]' && status ='yes'");
        $row = mysqli_fetch_array($res);
        if (password_verify($_POST['password'], $row['password'])) {
            $count = 1;
        }

        if ($count == 0) {
    ?>
            <div class="alert alert-danger">
                <strong style="color:white">Invalid</strong> Username Or Password.
            </div>
        <?php
        } else {
            $_SESSION["username"] = $_POST["username"];

        ?>
            <script type="text/javascript">
                window.location = "my_issued_books.php";
            </script>
    <?php
        }
    }
    ?>




</body>

</html>