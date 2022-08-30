<?php
session_start();
//error_reporting(0);
include('include/config.php');
// include('include/checklogin.php');
// check_login();
$run = $con->query('SELECT * FROM `books` WHERE Bcode="' . $_SESSION['id'] . '"; ');
$det = mysqli_fetch_array($run);
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
  <title>Book| <?php echo $det['Bname']; ?></title>
  <!-- Bootstrap core CSS -->
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
  <link rel="stylesheet" href="assets/css/styles.css?1422585377">
  <link rel="stylesheet" href="assets/css/plugins.css">
  <link rel="stylesheet" href="css/books.css">
  <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

</head>

<body>

  <nav class="bg-white navbar navbar-expand-lg navbar-light pb-lg-1 pt-lg-3 text-uppercase"></nav>
  <section class="product-details">
    <div class="image-slider">
      <div class="product-images">
        <img src="img/product image 1.jpg" class="active" alt="" />
        <img src="img/product image 2.png" alt="" />
        <img src="img/product image 3.png" alt="" />
        <img src="img/product image 4.png" alt="" />
      </div>
    </div>
  </section>
  <section>
    <div class="details">
      <h2 class="product-brand">Higher Engineering Mathematics</h2>
      <p class="product-short-des">b v ramana</p>

      <button class="btn">
        <select>
          <option>Library book</option>
          <option>E-book</option>
          <option>Buy online</option>
        </select>
      </button>

      <button class="btn-1 cart-btn-1">add to bag</button>
    </div>
  </section>
  <section class="detail-des">
    <h2 class="heading">description</h2>
    <p class="des">
      This Comprehensive text on Higher Engineering Mathematics covers the
      syllabus of all the mathematics papers offered to the undergraduate
      students.Plethora of Solved examples help the students know the variety
      of problems & Procedure to solve them. Plenty of practice problems
      facilitate testing their understanding of the subject.
    </p>
  </section>
  <footer></footer>
  <script src="js/nav.js"></script>
  <script src="js/footer.js"></script>
  <script src="js/home.js"></script>
  <script src="js/product.js"></script>
</body>

</html>