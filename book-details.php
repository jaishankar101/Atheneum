<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$addBook = $_GET['Bcode'];

if (isset($_GET['addsaved'])) {
  $addBook = $_GET['Bcode'];
  $con->query("INSERT INTO `book_issue`(`lib_id`,	`Bcode`	) values('" . $_SESSION['login'] . "',$addBook);");
  header("location:book-details.php");
}
$run = $con->query('SELECT * FROM `books` WHERE Bcode="' . $addBook . '"; ');
$row = mysqli_fetch_array($run);
?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Book| <?php echo $row['Bname']; ?></title>
  <!-- Bootstrap core CSS -->
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
  <link rel="stylesheet" href="assets/css/styles.css?1422585377">
  <link rel="stylesheet" href="assets/css/plugins.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
  <style>
    .mover {
      margin-top: 65px;
    }

    .bookimg {
      width: 250px;
      height: auto;

    }

    .book-content {
      display: flex;
      flex-direction: row;
      align-content: center;
      justify-content: space-around;
      margin-bottom: 200PX;
    }

    .bookdetails {
      padding-left: 60px;
      padding-top: 70px;
    }

    .bookdetails .details .book-name {
      FONT-SIZE: 35px;
      font-family: 'themify';
      font-weight: revert;
      color: black;
    }

    .bookdetails .details .book-author {
      font-size: large;
      font-style: normal;
      font-family: "Times New Roman", Times, serif;
    }

    .bookdetails .heading {
      text-decoration: underline;
      font-weight: 600;
    }

    .imgset {
      padding-left: 60px;
      padding-top: 70px;
    }

    .book-buttons {
      display: flex;
      flex-direction: row;
      align-content: space-around;
    }

    .pad-button {
      padding-left: 20px;
    }

    .pad-button button {
      padding: 8px;
      text-decoration: none;
      font-weight: 600;
      color: black;
      background-color: aqua;
      border-radius: 20px;
    }

    .pad-button button a {
      text-decoration: none;
      color: black;
    }

    .pad-button button:hover {
      text-decoration: inherit;
      color: white;
      background-color: red;
      border-radius: 20px;
    }
  </style>
</head>


<body>
  <div id="app">
    <?php //include('include/sidebar.php');
    ?>
    <div class="app-content">

      <?php include('include/header.php'); ?>
      <div class="mover">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
          <div class="row">
            <div class="col-sm-8">
              <h1 class="mainTitle"><a href="books.php" class="">All Books </a>/<?php echo htmlentities($row['Bname']); ?></h1>
            </div>
            <ol class="breadcrumb">
              <li>
                <span><a href="books.php" class="">All Books </a></span>
              </li>
              <li class="active">
                <span><?php echo htmlentities($row['Bname']); ?></span>
              </li>
            </ol>
          </div>
        </section>
      </div>
      <div class="book-content">
        <div class="imgset">
          <img src="<?php echo htmlentities($row['Bimg']); ?>" class="bookimg" alt="" />
        </div>
        <section class="bookdetails">
          <div class="details">
            <h2 class="book-name"><?php echo htmlentities($row['Bname']); ?></h2>
            <p class="book-author"><?php echo htmlentities($row['author']); ?></p>
            <?php
            if ($row['quantity']) {
              $button = "Add too Bag";
            ?>
              <h2 class="book-count" style="color: lightgreen;
    font-weight: 500;"><?php echo htmlentities($row['quantity']); ?></h2>

            <?php } else {
              $button = "Add too Wishlist";
            ?>
              <p class="card-text" style="color:red ;">Out Of Stock</p>
            <?php } ?>

          </div>

          <h2 class="heading">Description</h2>
          <p class="des">
            <?php echo htmlentities($row['details']); ?>
          </p>
          <div class="book-buttons">
            <a href="book-details.php?Bcode=<?php echo htmlentities($row['Bcode']); ?>&addsaved=add">
              <div class=" pad-button">
                <!-- <input type="hidden" name="addBook" value="<?php //echo htmlentities($row['Bcode']); 
                                                                ?>"> -->
                <button class="btn-1 cart-btn-1"><?php echo $button; ?></button>
              </div>
            </a>
            <div class="pad-button">

              <button class="btn-1 cart-btn-1"><a href="<?php echo htmlentities(($row['e_link'])) ?>"> Buy Online</a></button>
            </div>
            <div class="pad-button">

              <button class="btn-1 cart-btn-1"><a href="<?php echo htmlentities(($row['e_link'])) ?>"> E-link</a></button>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>


  <footer></footer>
  <!-- <script src="js/nav.js"></script> -->
  <script src="js/footer.js"></script>
  <script src="js/home.js"></script>
  <!-- <script src="js/product.js"></script> -->
</body>

</html>