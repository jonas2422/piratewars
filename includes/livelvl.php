<?php
session_start();
include 'db.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE ID = '$id'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
  echo $row['level'];
}

 ?>
