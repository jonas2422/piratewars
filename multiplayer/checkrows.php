<?php
session_start();
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];
include '../includes/db.php';
$user = $_SESSION['user'];
$sql = "SELECT * FROM ". $serverone . $servertwo . "";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) < 2 ) {
  echo 'true';
}else {
  echo 'false';
}
 ?>
