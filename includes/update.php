<?php
session_start();

  include 'db.php';
  $uppassword = $_POST['uppassword'];
  $upemail = $_POST['upemail'];
  $user = $_SESSION['user'];
  if (!empty($upemail)) {
    $sqlu = "UPDATE users SET email = '$upemail' WHERE username = '$user'";
    mysqli_query($conn, $sqlu);
  }
  if (!empty($uppassword)) {
    $hashed_password = password_hash($uppassword, PASSWORD_DEFAULT);
    $sqlp = "UPDATE users SET password = '$hashed_password' WHERE username = '$user'";
    mysqli_query($conn, $sqlp);
  }


  ?>
