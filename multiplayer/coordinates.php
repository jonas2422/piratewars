<?php
include '../includes/db.php';
session_start();
$user = $_SESSION['user'];
$x = $_POST['x'];
$y = $_POST['y'];
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];
$sql1 = "UPDATE ". $serverone . $servertwo . " SET x ='$x', y ='$y' WHERE id = '1'";
mysqli_query($conn, $sql1);
 ?>
