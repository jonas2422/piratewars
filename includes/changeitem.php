<?php
include 'db.php';
session_start();
$user = $_SESSION['id'];
$name = $_POST['name'];
$string = preg_replace('/\s+/', '', $name);
$sql = "UPDATE users SET item ='$string' WHERE ID = '$user'";
mysqli_query($conn, $sql);
 ?>
