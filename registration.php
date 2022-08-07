<?php
include_once("include/config.php");
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $lib_id = $_POST['lib_id'];
    $usn = $_POST['usn'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = "INSERT INTO `student_info`(`std_name`, `lib_id`, `usn`, `number`, `email`, `password`) VALUES ('$name','$lib_id','$usn','$number','$email','$password')";

    if ($con->query($query)) {
        echo "<script>alert('Successfully Registered. You can login now');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Atheneum||Registeration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <style>
        body {
            color: #fff;
            background: #63738a;
            font-family: 'Roboto', sans-serif;
        }

        .form-control {
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }

        .form-control:focus {
            border-color: #5cb85c;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .signup-form {
            width: 450px;
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
        }

        .signup-form h2 {
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }

        .signup-form h2:before,
        .signup-form h2:after {
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
        }

        .signup-form h2:before {
            left: 0;
        }

        .signup-form h2:after {
            right: 0;
        }

        .signup-form .hint-text {
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
        }

        .signup-form .row div:first-child {
            padding-right: 10px;
        }

        .signup-form .row div:last-child {
            padding-left: 10px;
        }

        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #5cb85c;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }

        .star {
            margin: 0;
            width: fit-content;
            height: 13px;
        }

        .input-icon {
            height: fit-content;
        }

        .copyright {
            text-align: center;
            /* position: static; */

        }
    </style>
</head>

<body>
    <div class="signup-form">
        <form method="post">
            <h2>Register</h2>
            <p class="hint-text">Create your account,It'll only takes a minute.</p>

            <div class="form-group">
                <p style="color:red" class="star">*</p>
                <span class="input-icon">
                    <input type="text" class="form-control" name="name" placeholder="Name" autofocus required="required">
                    <i class="fa fa-user"></i> </span>
            </div>
            <div class="form-group">
                <p style="color:red" class="star">*</p>
                <span class="input-icon">
                    <input type="text" class="form-control" name="usn" placeholder="USN" autocomplete="off" required="required">
                    <i class="fa fa-user"></i> </span>
            </div>
            <div class="form-group">
                <p style="color:red" class="star">*</p>
                <span class="input-icon">
                    <input type="text" class="form-control" name="lib_id" placeholder="Library-ID" autocomplete="off" required="required">
                    <i class="fa fa-user"></i> </span>
            </div>

            <div class="form-group">
                <p style="color:red" class="star">*</p>
                <span class="input-icon">
                    <input type="text" class="form-control" name="number" placeholder="Phone Number" autocomplete="off" required="required">
                    <i class="fa fa-phone"></i> </span>
            </div>
            <div class="form-group">
                <p style="color:red" class="star">*</p>
                <span class="input-icon">
                    <input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()" autocomplete="off" placeholder="Email" required>
                    <i class="fa fa-envelope"></i> </span>
                <span id="user-availability-status1" style="font-size:12px;"></span>
            </div>
            <div class="form-group">
                <span class="input-icon">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <i class="fa fa-lock"></i> </span>
            </div>
            <div class="form-group">
                <span class="input-icon">
                    <input type="password" class="form-control" name="password_again" placeholder="Confirm Password" required>
                    <i class="fa fa-lock"></i> </span>
            </div>
            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
            </div>

        </form>
        <div class="text-center">Already have an account? <a href="user-login.php">Sign in</a></div>
        <div class="copyright">
            &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Atheneum</span>. <span>All rights reserved</span>
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

    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>
</body>

</html>