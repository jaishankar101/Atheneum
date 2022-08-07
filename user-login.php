<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
    $query = "SELECT * FROM `student_info` WHERE lib_id='" . $_POST['lib_id'] . "' and password='" . md5($_POST['password']) . "'";
    $result = $con->query("$query");
    $num = mysqli_fetch_array($result);
    $host = $_SERVER['HTTP_HOST'];
    $uip = $_SERVER['REMOTE_ADDR'];
    if ($num > 0) {
        $extra = "dashboard.php";
        $_SESSION['login'] = $_POST['lib_id'];
        $_SESSION['name'] = $num['std_name'];

        $status = 1;
        $log = $con->query("INSERT INTO `userlog`(`lib_id`, `name`, `userip`, `status`) values('" . $_SESSION['login'] . "','" . $_SESSION['name'] . "','$uip','$status');");
        $uri = rtrim(dirname($_SERVER['PHP_SELF']));

        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $status = 0;
        $extra = "user-login.php";
        mysqli_query($con, "INSERT INTO `userlog`(`lib_id`, `name`, `userip`, `status`) values('" . $_SESSION['login'] . "','" . $_SESSION['name'] . "','$uip','$status');");
        $_SESSION['errmsg'] = "Invalid username or password";
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Atheneum||Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <style>
        body {
            /* color: #0d0d0d; */
            background: #b3e6ff;
            font-family: 'Roboto', sans-serif;
        }

        .logo h2 {
            text-decoration: solid;
            font-weight: bold;
        }
    </style>
</head>


<body class="login">
    <div class="row">
        <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="logo margin-top-30">
                <h2> Atheneum | Student Login</h2>
            </div>

            <div class="box-login">
                <form class="form-login" method="post">
                    <fieldset>
                        <legend>
                            Sign in to your account
                        </legend>
                        <p>
                            Please enter your Library ID and password to log in.<br />
                            <span style="color:red;"><?php echo $_SESSION['errmsg'];
                                                        echo $_SESSION['errmsg'] = ""; ?></span>
                        </p>
                        <div class="form-group">
                            <span class="input-icon">
                                <input type="text" class="form-control" name="lib_id" placeholder="Library ID">
                                <i class="fa fa-user"></i> </span>
                        </div>
                        <div class="form-group form-actions">
                            <span class="input-icon">
                                <input type="password" class="form-control password" name="password" placeholder="Password">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="form-actions">

                            <button type="submit" class="btn btn-primary pull-right" name="submit">
                                Login <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                        <div class="new-account">
                            Don't have an account yet?
                            <a href="registration.php">
                                Create an account
                            </a>
                        </div>
                    </fieldset>
                </form>

                <div class="copyright">
                    &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Atheneum</span>. <span>All rights reserved</span>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/login.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });
    </script>
</body>

</html>