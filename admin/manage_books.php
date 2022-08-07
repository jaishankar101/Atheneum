<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
// check_login();


if (isset($_GET['del'])) {
    $con->query("DELETE from `books` where Bcode = '" . $_GET['Bcode'] . "'");
    $_SESSION['msg'] = "data deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Manage Books</title>
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
    <link rel="stylesheet" href="assets/css/styles.css?1422585377">
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
                                <h1 class="mainTitle">Admin | Manage Books</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><a href="dashboard.php">
                                        <span>Admin</span></a>
                                </li>
                                <li class="active">
                                    <span>Manage Books</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">


                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                <table class="table table-hover table-striped" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="center hidden-xs">Book Code</th>
                                            <th class="center">Image</th>
                                            <th class="center">Book Name</th>
                                            <th class="center" style="width:120px">Author</th>
                                            <th class="center">Edition</th>
                                            <th class="center">Department</th>
                                            <th class="center">Supplier</th>
                                            <th class="center">E-Link</th>
                                            <th class="center">Quantity</th>
                                            <th class="center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $con->query("SELECT * from `books`");
                                        $count = 1;
                                        while ($row = mysqli_fetch_array($sql)) {
                                        ?>

                                            <tr>
                                                <td class="center"><?php echo $count; ?>.</td>
                                                <td class="center hidden-xs"><?php echo $row['Bcode']; ?></td>
                                                <td class="center"><img src="<?php echo "../" . $row['Bimg']; ?>" style="height: 100px;width: fit-content"></td>
                                                <td class="center"><?php echo $row['Bname']; ?></td>
                                                <td class="center"><?php echo $row['author']; ?></td>
                                                <td class="center"><?php echo $row['ed']; ?></td>
                                                <td class="center"><?php echo $row['dept']; ?></td>
                                                <td class="center"><?php echo $row['supplier_id']; ?></td>
                                                <td class="center"><a href="<?php echo $row['e_link'];  ?>" class="link">Click Here</a></td>
                                                <td class="center"><?php echo $row['quantity']; ?></td>

                                                <td>
                                                    <!-- <div class="visible-md visible-lg"> -->
                                                    <a href="edit_book.php?Bcode=<?php echo $row['Bcode']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>

                                                    <a href="manage_books.php?Bcode=<?php echo $row['Bcode'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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

        </div>
    </div>
    </div>
    <?php include('include/footer.php'); ?>
    </div>
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