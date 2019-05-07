<?php
session_start();
include 'db.php';
$user = $_SESSION['user'];
$sql = "SELECT * from users where username = '$user'";
$res = mysqli_query($conn, $sql);
$levelone = 1;
$max = 20;
$min = 10;

  while ($row = mysqli_fetch_assoc($res)) {
    if ($max > $row['wins'] && $row['wins'] >= $min) {
      $level =  2;
      $update = "UPDATE users SET level = '$level' WHERE username = '$user'";
      mysqli_query($conn, $update);
    }elseif($row['wins'] >= $max){
      $level = 3;
      $update = "UPDATE users SET level = '$level' WHERE username = '$user'";
      mysqli_query($conn, $update);
    }

  }
  echo $level;


 ?>
