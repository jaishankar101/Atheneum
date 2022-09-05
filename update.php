<?php
error_reporting(0);
include('include/config.php');
$addBook = $_POST['book_code'];
$con->query("INSERT INTO `book_issue`(`lib_id`,`Bcode`) VALUES ('" . $_SESSION['login'] . "',$addBook); ");
