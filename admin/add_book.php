<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
// check_login();

if (isset($_POST['submit'])) {
    $Bcode = $_POST['Bcode'];
    $Bname = $_POST['Bname'];
    $author = $_POST['author'];
    $ed = $_POST['ed'];
    $details = $_POST['details'];
    $dept = $_POST['Dept'];
    $e_link = $_POST['e_link'];
    $supplier_id = $_POST['supplier_id'];
    $quantity = $_POST['quantity'];
    //IMAGE :START
    $img = $_FILES['img'];
    $imgname = $img['name'];
    $basicext = array("png", "jpg", "jpeg");
    $temp = $img['tmp_name'];
    $namesplit = explode(".", $imgname);
    $imgext = strtolower(end($namesplit));
    if (in_array($imgext, $basicext)) {
        $directory = "img/books/" . $dept . "/" . $Bcode . "." . $imgext;
        move_uploaded_file($temp, "../" . $directory);
    } else {
        $extra = "add_book.php";
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
        $_SESSION['errmsg'] = "Invalid Extention";
    }
    //IMAGE :END

    $sql = "INSERT INTO `books` (`Bcode`,`Bimg`, `Bname`, `author`, `ed`, `details`,`dept`, `e_link`,`supplier_id`,`quantity`) VALUES
    ('$Bcode','$directory', '$Bname', '$author', '$ed', '$details','$dept','$e_link','$supplier_id','$quantity');";
    if ($con->query($sql)) {
        echo "<script>alert('Book info added Successfully');</script>";
        $host = $_SERVER['HTTP_HOST'];
        $extra = "add_book.php";
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Add Books</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

</head>

<body>
    <div id="app">
        <?php //include('include/sidebar.php'); 
        ?>
        <div class="app-content">

            <?php include('include/header.php'); ?>

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | Add Books</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><a href="dashboard.php">
                                        <span>Admin</span></a>
                                </li>
                                <li class="active">
                                    <span>Add Books</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Add Book</h5>
                                            </div>
                                            <div class="panel-body">

                                                <form role="form" name="addbook" method="post" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label for="BookCode">
                                                            Book Code
                                                        </label>
                                                        <input type="text" name="Bcode" class="form-control" placeholder="Enter Book Code" autocomplete="off" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="BookName">
                                                            Book Name
                                                        </label>
                                                        <input type="text" name="Bname" class="form-control" placeholder="Enter Book Name" autocomplete="off" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <span style="color:red;"><?php echo $_SESSION['errmsg'];
                                                                                    echo $_SESSION['errmsg'] = ""; ?></span>
                                                        <label for="BookImg">
                                                            Upload Book Image(JPG,JPEG or PNG)
                                                        </label>
                                                        <input type="file" name="img" class="form-control" placeholder="Upload Book Image" required="required">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Author">
                                                            Author Name
                                                        </label>
                                                        <input type="text" name="author" class="form-control" placeholder="Enter Author Name" autocomplete="off" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Edition">
                                                            Book Edition
                                                        </label>
                                                        <input type="text" name="ed" class="form-control" placeholder="Enter Edition" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Details">
                                                            Book Details
                                                        </label>
                                                        <textarea name="details" class="form-control" placeholder="Enter Book Details"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="BookDepartment">
                                                            Department
                                                        </label>
                                                        <select name="Dept" class="form-control" required="required">
                                                            <option value="">Select Department</option>
                                                            <?php
                                                            $ret = mysqli_query($con, "SELECT * from `department`;");
                                                            while ($row = mysqli_fetch_array($ret)) {
                                                            ?>
                                                                <option value="<?php echo htmlentities($row['dept_id']); ?>">
                                                                    <?php echo htmlentities($row['dept_name']); ?>
                                                                </option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="E-link">
                                                            E-Link
                                                        </label>
                                                        <input type="text" name="e_link" class="form-control" placeholder="Enter E-Link">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Supplier">
                                                            Supplier Name
                                                        </label>
                                                        <select name="supplier_id" class="form-control" required="required">
                                                            <option value="">Select Supplier</option>
                                                            <?php
                                                            $ret = mysqli_query($con, "SELECT * from `supplier`;");
                                                            while ($row = mysqli_fetch_array($ret)) {
                                                            ?>
                                                                <option value="<?php echo htmlentities($row['supplier_id']); ?>">
                                                                    <?php echo htmlentities($row['supplier_name']); ?>
                                                                </option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Quantity">
                                                            Quantity
                                                        </label>
                                                        <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" required="required">
                                                    </div>

                                                    <div class="form-actions">

                                                        <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                            Submit
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="panel panel-white">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include('include/footer.php'); ?>
    </div>
    <!-- js -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>
</body>

</html>