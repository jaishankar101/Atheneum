<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_GET['del'])) {
    $con->query("DELETE from `books` where Bcode = '" . $_GET['Bcode'] . "'");
    $_SESSION['msg'] = "data deleted !!";
}
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
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <style>
        .hidden {
            display: none !important;
        }

        .container-fluid {
            margin-top: 70px;
        }

        .mover {
            margin-top: 65px;
        }
    </style>
</head>

<body>
    <div id="app">

        <div class="app-content">

            <?php include('include/header.php'); ?>
            <div class="mover">
                <!-- start: PAGE TITLE -->
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle"><a href="dashboard.php" class="">Dashboard </a>/Saved Books</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span><a href="dashboard.php" class="">Dashboard </a></span>
                            </li>
                            <li class="active">
                                <span>Saved Books</span>
                            </li>
                        </ol>
                    </div>
                </section>
            </div>
            <div class="container-fluid container-fullw bg-white">


                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                            <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                        <table class="table table-hover table-striped" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th class="center">Book Code</th>
                                    <th class="center hidden-xs">Book Img</th>
                                    <th class="center">Book Name</th>
                                    <th class="center">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $con->query("SELECT * from `book_issue` where status=0 and lib_id='" . $_SESSION['login'] . "'   ;");
                                $count = 1;
                                while ($row = mysqli_fetch_array($sql)) {
                                    $bookname = $con->query("SELECT `Bname` from `books` where Bcode='" . $row['Bcode'] . "';");
                                    $bookimg = $con->query("SELECT `Bimg` from `books` where Bcode='" . $row['Bcode'] . "';");
                                ?>

                                    <tr>
                                        <td class="center"><?php echo $count; ?>.</td>
                                        <td class="center hidden-xs"><?php echo $row['Bcode']; ?></td>
                                        <td class="center"><img src="<?php echo  $bookimg ?>" style="height: 100px;width: fit-content"></td>
                                        <td class="center"><?php echo $bookname;
                                                            ?></td>
                                        <td>
                                            <!-- <div class="visible-md visible-lg"> -->

                                            <a href="saved_books.php?Bcode=<?php echo $row['Bcode'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                            <!-- </div> -->
                                        </td>
                                    </tr>

                                <?php
                                    $count = $count + 1;
                                } ?>


                            </tbody>
                        </table>
                    </div>
                </div>
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