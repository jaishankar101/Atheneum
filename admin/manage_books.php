<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
// check_login();


if (isset($_GET['del'])) {
    $con->query("DELETE from `books` where id = '" . $_GET['Bcode'] . "'");
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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
    <div id="app">
        <?php include('include/sidebar.php'); ?>
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
                                <li>
                                    <span>Admin</span>
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
                            <div class="col-md-12">
                                <!-- <h5 class="over-title margin-bottom-15 text-bold">Manage <span class="text-bold">Books</span></h5> -->
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="center hidden-xs">Book Code</th>
                                            <th>Book Name</th>
                                            <th>Author</th>
                                            <th>Edition</th>
                                            <th>Department</th>
                                            <th>Supplier</th>
                                            <th>Action</th>

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
                                                <td class="center"><?php echo $row['Bname']; ?></td>
                                                <td class="center"><?php echo $row['ed']; ?></td>
                                                <td class="center"><?php echo $row['dept']; ?></td>
                                                <td class="center"><?php echo $row['supplier']; ?></td>

                                                <td>
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <a href="edit-doctor.php?id=<?php echo $row['Bcode']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>

                                                        <a href="manage-doctors.php?id=<?php echo $row['Bcode'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                                    </div>
                                                    <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                        <div class="btn-group" dropdown is-open="status.isopen">
                                                            <button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
                                                                <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right dropdown-light" role="menu">
                                                                <li>
                                                                    <a href="#">
                                                                        Edit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        Remove
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
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

        function addsub() {

        };
    </script>
</body>

</html>