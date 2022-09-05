<?php
function check_login()
{
	$_SESSION['login'] = "";
	if (strlen($_SESSION['admin']) == 0) {
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "admin-login.php";
		$_SESSION["admin"] = "";
		header("Location: http://$host$uri/$extra");
	}
}
