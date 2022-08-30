<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
// check_login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | User Session Logs</title>
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

<body class="">
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
                                <h1 class="mainTitle">User Session Logs</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin </span>
                                </li>
                                <li class="active">
                                    <span>User Session Logs</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">


                        <div class="row">
                            <div class="col-md-12">

                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>

                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="hidden-xs">Library ID</th>
                                            <th>Name</th>
                                            <th>User IP</th>
                                            <th>Login time</th>
                                            <th>Logout Time </th>
                                            <th> Status </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $con->query("select * from `atheneum`.`userlog`;");
                                        $count = 1;
                                        while ($row = mysqli_fetch_array($sql)) {
                                        ?>

                                            <tr>
                                                <td class="center"><?php echo $count; ?>.</td>
                                                <td class="hidden-xs"><?php echo $row['lib_id']; ?></td>
                                                <td class="hidden-xs"><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['userip']; ?></td>
                                                <td><?php echo $row['LoginTime']; ?></td>
                                                <td><?php echo $row['logout']; ?>
                                                </td>

                                                <td>
                                                    <?php if ($row['status'] == 1) {
                                                        echo "Success";
                                                    } else {
                                                        echo "Failed";
                                                    } ?>

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