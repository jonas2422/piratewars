<?php
session_start();
include 'db.php';
$user = $_SESSION['id'];
$sql = "SELECT * FROM users where ID = '$user'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
  if ($row['gold'] >= 300) {
    echo 1;
    $gold = $row['gold'] - 300;
    $sql = "UPDATE users SET gold = '$gold' WHERE username = '$user'";
    mysqli_query($conn, $sql);
    $_SESSION['gold'] = $gold;
  }else {
    echo 2;
  }
}

 ?>
