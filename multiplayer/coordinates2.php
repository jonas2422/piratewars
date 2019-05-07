<?php
include '../includes/db.php';
session_start();
$user = $_SESSION['user'];
$x2 = $_POST['x2'];
$y2 = $_POST['y2'];
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];
$sql2 = "UPDATE ". $serverone . $servertwo . " SET x ='$x2', y ='$y2' WHERE id = '2'";
mysqli_query($conn, $sql2);
 ?>
