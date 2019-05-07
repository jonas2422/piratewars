<?php
session_start();
include '../includes/db.php';
$user = $_SESSION['user'];
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];
$sql = "SELECT * FROM ". $serverone . $servertwo . " WHERE user = '$user'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
  if ($row['t'] == 'true') {
    echo 2;
  }
  else {
    echo 1;
  }
}
 ?>
