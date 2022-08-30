<?php
function check_login()
{
	if ($_SESSION['login'] == "" || $_SESSION['login'] == "admin1") {
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "./index.php";
		$_SESSION["login"] = "";
		header("Location: http://$host$uri/$extra");
	}
}
