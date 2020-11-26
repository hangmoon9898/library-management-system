<?php
session_start();
if (!isset($_SESSION["librarian"])) {
?>
  <script type="text/javascript">
    window.location = "login.php";
  </script>
<?php
}

include "connection.php";
include "header.php";


function getBookData($isbn)
{
  $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:$isbn" . "&country=US";
  $result = file_get_contents($url);
  $response = json_decode($result, true);
  $title = $response["items"][0]["volumeInfo"]["title"];
  $author = $response["items"][0]["volumeInfo"]["authors"][0];
  $thumbnail = $response["items"][0]["volumeInfo"]["imageLinks"]["smallThumbnail"];
  $published = $response["items"][0]["volumeInfo"]["publishedDate"];
  $publisher = $response["items"][0]["volumeInfo"]["publisher"];
  $price = $response["items"][0]["saleInfo"]["listPrice"]["amount"];
  $currency = $response["items"][0]["saleInfo"]["listPrice"]["currencyCode"];
  $array = [
    "title" => "$title",
    "authors" => "$author",
    "thumbnail" => "$thumbnail",
    "published" => "$published",
    "publisher" => "$publisher",
    "price" => "$price $currency"
  ];
  return $array;
}

$a = [];
if (isset($_POST["getBookDetails"])) {
  $a = getBookData($_POST["booksisbn"]);
  file_put_contents("books_image/tmp.jpg", fopen($a["thumbnail"], 'r'));
  $randomName = md5(time());
  $fileType = ".jpg";
  $fileName = "books_image/" . $randomName . $fileType;
  rename("books_image/tmp.jpg", $fileName);
}

$x = $fileName;
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
          <h2>Add New Books</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
            <div class="wrapper">
              <input type="text" class="form-control reg-field" name="booksisbn" placeholder="books ISBN" value="<?php echo $_POST["booksisbn"]; ?>" required style="width: calc(100% - 118px); display: inline-block;">
              <input type="submit" class="btn btn-default submit" name="getBookDetails" value="Add ISBN" style="width: auto; margin: 10px -10px 10px 10px; display: inline-block;">
            </div>
            <input type="text" class="form-control reg-field" name="booksname" placeholder="books name" value="<?php echo $a["title"]; ?>">
            <div class="wrapper">
              <input type="text" class="form-control reg-field" name="imageFile" placeholder="books image" value="<?php if (isset($fileName)) {
                                                                                                                    echo $fileName;
                                                                                                                  } ?>" readonly style="display: inline-block; width: calc(100% - 127px);">
              <label for="file-upload" class="btn btn-default" style="width: auto; margin: 10px -10px 10px 10px; display: inline-block;">Choose file</label>
              <input id="file-upload" type="file" name="fl" class="btn btn-default btn-float" onChange="takeValue()">
            </div>
            <input type="text" class="form-control reg-field" name="bauthorname" placeholder="books author name" value="<?php echo $a["authors"]; ?>">
            <input type="text" class="form-control reg-field" name="pname" placeholder="publication name" value="<?php echo $a["publisher"]; ?>">
            <input type="text" class="form-control reg-field" name="bpdate" placeholder="books purchase date">
            <input type="text" class="form-control reg-field" name="bprice" placeholder="books price" value="<?php if ($a["price"] != " ") {
                                                                                                                echo $a["price"];
                                                                                                              } ?>">
            <input type="text" class="form-control reg-field" name="bqty" placeholder="books quantity">
            <input type="text" class="form-control reg-field" name="aqty" placeholder="available quantity">
            <input type="submit" class="btn btn-default submit" name="insertDetails" value="Insert books detail" style="width: auto; float:right; margin: 30px -10px 0 0;">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->

<?php

include "footer.php";

if (isset($_POST["insertDetails"])) {
  $demo = mysqli_query($link, "SELECT id from librarian_registration WHERE username='" . $_SESSION["librarian"] . "'");
  if ($demo = 22) { ?>
    <script type="text/javascript">
      alert("You cannot perform this action as a demo user.");
      window.location.href = "display_books.php";
    </script>
    <? } else {
    mysqli_query($link, "INSERT INTO add_books VALUES('','$_POST[booksname]','$_POST[imageFile]','$_POST[bauthorname]','$_POST[pname]','$_POST[bpdate]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]','$_SESSION[librarian]')"); ?>
    <script type="text/javascript">
      alert("Book added successfully!");
    </script>
<?php
  }
}
?>

<script type="text/javascript">
  function takeValue() {
    var a = document.getElementById('file-upload').value;
    document.getElementByName('imageFile').value = a;
  }
</script>

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