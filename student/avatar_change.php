<?php
session_start();
include "header.php";
include "connection.php";
if (!isset($_SESSION["username"])) {
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
                    <h2>Set avatar</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="upload">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                            <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" required>
                            <p><input type="submit" value="Upload Image" name="submit" class="btn btn-default" style="margin-top: 30px;"></p>
                        </form>
                    </div>


                    <?php

                    // Check if image file is a actual image or fake image
                    if (isset($_POST["submit"])) {
                        $demo = mysqli_query($link, "SELECT id from student_registration WHERE username='" . $_SESSION["student"] . "'");
                        if ($demo = 15) { ?>
                            <script>
                                alert("You cannot perform this action as a demo user");
                            </script>
                        <?php } 
                        else {
                            $target_dir = "images/";
                            $uploadOk = 1;
                            $target_file = $target_dir . $_SESSION['username'] . ".jpg";
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if ($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "File is not an image.";
                                $uploadOk = 0;
                            }

                            // Check file size
                            if ($_FILES["fileToUpload"]["size"] > 10485760) {
                                echo "Sorry, your file is too large.";
                                $uploadOk = 0;
                            }
                            // Allow certain file formats
                            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                echo "Sorry, only image files in the format of JPG, JPEG, PNG & GIF are allowed.";
                                $uploadOk = 0;
                            }
                            // Check if $uploadOk is set to 0 by an error
                            if ($uploadOk == 0) {
                                echo "Sorry, your file was not uploaded.";
                                // if everything is ok, try to upload file
                            } else {
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                    header('Location: my_issued_books.php');
                                } else {
                                    echo "Sorry, there was an error uploading your file.";
                                }
                            }
                        }
                    }
                    ?>

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