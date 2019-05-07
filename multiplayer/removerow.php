<?php
session_start();
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];
include '../includes/db.php';
$user = $_SESSION['user'];
$sql = "SELECT * FROM ". $serverone . $servertwo . " WHERE user = '$user'";
$res = mysqli_query($conn, $sql);
  mysqli_query($conn, "DELETE FROM `".$serverone ."".$servertwo."` WHERE user = '$user'");
  mysqli_query($conn, "DELETE FROM chat WHERE user = '$user'");
  if (mysqli_num_rows($res) == 0){
  mysqli_query($conn, "DROP TABLE `".$serverone ."".$servertwo."`");
  header("Location: ../dashboard.php");
}
 ?>
