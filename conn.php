<?php
$host = 'localhost';
// $host='127.0.0.1';
$db = 'mydatabase';
$user = 'root';
$password = '';
$charset = 'utf8mb4';
$dsn = "mysql:host:$host;dbname:$db:charset:$charset;";

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
}


// practice
// $host="localhost";
// $user="root";
// $password="";
// $charset="utf8mb4";
// $db="holaluya";
// $dsn="mysql:host:$host;dbname:$db;charset:$charset;";
// try{
//     $pdo=new PDO($dsn,$user,$password);
// }catch(PDOException $e)
// {
//     echo "fuck got an exception";
// }