<?php
session_start();
include '../includes/db.php';
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];
$sql = "SELECT * FROM ". $serverone . $servertwo . " WHERE id = '2'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
  echo $row['boat'];
}
 ?>
