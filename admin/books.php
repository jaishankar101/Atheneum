<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Books</title>
  <!-- Bootstrap core CSS -->
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
  <link rel="stylesheet" href="assets/css/styles.css?1422585377">
  <link rel="stylesheet" href="assets/css/plugins.css">
  <link rel="stylesheet" href="css/books.css">
  <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
  <style>
    .hidden {
      display: none !important;
    }
  </style>
</head>

<body>
  <div id="app">
    <?php include('include/sidebar.php');
    ?>
    <div class="app-content">

      <?php include('include/header.php'); ?>
      <div class="main-content">
        <div class="wrap-content container" id="container">
          <div class="container-fluid container-fullw bg-white">
            <div class="row">
              <?php
              $ret = mysqli_query($con, "SELECT * from `department`;");
              while ($row = mysqli_fetch_array($ret)) {
              ?>

                <h3 id="#<?php echo htmlentities($row1['dept']); ?>"><?php echo htmlentities($row['dept_name']); ?></h3>
                <?php
                $bet = mysqli_query($con, "SELECT * from `books` where dept='" . $row['dept_id'] . "';");
                while ($row1 = mysqli_fetch_array($bet)) {

                ?>
                  <a class="card" href="book-details.php?Bcode=<?php echo htmlentities($row1['Bcode']); ?>">
                    <input class="hidden" name="book_code" value="<?php echo htmlentities($row1['Bcode']); ?>">

                    <button type="submit">
                      <img class="card-img-top" src="<?php echo htmlentities($row1['Bimg']); ?>" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo htmlentities($row1['Bname']); ?></h5>
                        <?php
                        if ($row1['quantity']) {
                          $button = "Add too Bag";
                        ?>
                          <p class="card-text" style="color:green ;">Available:<?php echo htmlentities($row1['quantity']); ?></p>
                        <?php } else {
                          $button = "Add too Wishlist";
                        ?>
                          <p class="card-text" style="color:red ;">Out Of Stock</p>
                        <?php } ?>
                        <p class="card-text" style="color:black ;"><?php echo htmlentities($row1['details']); ?></p>
                    </button>
                    </form>
            </div>
          <?php } ?>
          <br>
        <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('include/footer.php');

  ?>
  </div>
  <!-- scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/form-elements.js"></script>
  <script>
    jQuery(document).ready(function() {
      Main.init();
      FormElements.init();
    });

    // function addbook(val) {
    //   $.ajax({
    //     type: "POST",
    //     url: "update.php",
    //     data: 'Bcode=' + val,
    //     success: function(data) {
    //       let bagbutton = document.querySelector(".btn-book");
    //       bagbutton.innerText = "✅Added";
    //       bagbutton.style = "background-color:white !important; color:green";
    //     }
    //   });
    // }
    // function addbag(book_code) {
    //   let bagbutton = document.querySelector(".btn-book");
    //   bagbutton.innerText = "✅Added";
    //   bagbutton.style = "background-color:white !important; color:green";
    //   var b = {
    //     book_code: book_code
    //   }
    //   $.post("update.php", b);
    // }
  </script>
</body>

</html>