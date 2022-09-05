<?php
session_start();
include('include/config.php');
$_SESSION['admin-name'] == "";
date_default_timezone_set('Asia/Kolkata');
$ldate = date('Y-m-d h:i:s A', time());
// mysqli_query($con, "UPDATE `adminlog`  SET Logout = '$ldate' WHERE admin_id = '" . $_SESSION['admin'] . "' ORDER BY admin_id DESC LIMIT 1");
session_unset();
session_destroy();
$_SESSION['errmsg'] = "You have successfully logout";
?>
<script language="javascript">
    document.location = "./admin-login.php";
    alert("You have successfully logout");
</script>