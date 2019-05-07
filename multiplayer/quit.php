<?php
session_start();
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];
include '../includes/db.php';
$sql = "SELECT * FROM ". $serverone . $servertwo . "";
$checktable = mysqli_query($conn, $sql);
if (mysqli_num_rows($checktable) >= 0) {
  mysqli_query($conn, "DROP TABLE `".$serverone ."".$servertwo."`");
  mysqli_query($conn, "DELETE FROM chat WHERE user = '$serverone'");
  mysqli_query($conn, "DELETE FROM chat WHERE user = '$servertwo'");
  echo 'dropped';
}
 ?>
