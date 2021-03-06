<!DOCTYPE html>
<html lang="en">

<?php
  function GetAvatar($p)
  {
    if(file_exists("images/$p.jpg")) {
      return  "<img src='images/$p.jpg' alt='' class='img-circle profile_img' style='height:60px; width: 60px;'>";
    } else {
      return  "<img src='images/user.jpg' alt='' class='img-circle profile_img' style='height:60px; width: 60px;'>";
    }
  }

  function GetAvatarLine($p)
  {
    if(file_exists("images/$p.jpg")) {
      return  "<img src='images/$p.jpg'>";
    } else {
      return  "<img src='images/user.jpg'>";
    }
  }
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hamoli</title>
    <script src="https://kit.fontawesome.com/1eb74701d6.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/book.png"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body class="nav-md">

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="display_books.php" class="site_title"><i class="fa fa-book"></i> <span>HAMOLI</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <?php echo GetAvatar($_SESSION["librarian"]); ?>
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo $_SESSION["librarian"]; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">

                            <li><a href="display_books.php"><i class="fas fa-home"></i> Manage Books</a>

                            <li><a href="display_student_info.php"><i class="fas fa-table"></i> Manage Users</a>

                            </li>
                            <li><a href="add_books.php"><i class="fas fa-plus"></i> Add Books</a>

                            </li>
                            <li><a href="issue_books.php"><i class="fas fa-folder-open"></i> Issue Books</a>

                            </li>
                            <li><a href="return_books.php"><i class="fas fa-undo-alt"></i> Return Books</a>

                            </li>
                            <li><a href="books_details_with_students.php"><i class="fas fa-list"></i> Manage Issued Books</a>

                            </li>
                            <li><a href="change_password_for_students2.php"><i class="fas fa-key"></i> Change Users Password</a>

                            </li>

                        </ul>
                    </div>


                </div>

            </div>
        </div>

<!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                               <?php echo GetAvatarLine($_SESSION["librarian"]);?>
                               <?php echo $_SESSION["librarian"]; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="avatar_change.php"><i class="fas fa-user"></i> Change profile picture</a></li>
                                <li><a href="change_password.php"><i class="fas fa-lock"></i> Change password</a></li>
                                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
