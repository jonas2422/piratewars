<?php
session_start();
include 'db.php';
$ms = $_POST['msg'];
$user = $_POST['user'];
$sql = "INSERT INTO chat (user, message) VALUES ('$user', '$ms')";
mysqli_query($conn, $sql);
echo "working";
 ?>
