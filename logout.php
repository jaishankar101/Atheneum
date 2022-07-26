<?php
session_start();
include('include/config.php');
$_SESSION['name'] == "";
date_default_timezone_set('Asia/Kolkata');
$ldate = date('d-m-Y h:i:s A', time());
mysqli_query($con, "UPDATE `userlog`  SET logout = '$ldate' WHERE lib_id = '" . $_SESSION['login'] . "' ORDER BY lib_id DESC LIMIT 1");
session_unset();
session_destroy();
$_SESSION['errmsg'] = "You have successfully logout";
?>
<script language="javascript">
    document.location = "./user-login.php";
    alert("You have successfully logout");
</script>