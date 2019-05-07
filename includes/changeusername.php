<?php
if (isset($_POST['submit'])) {
  session_start();
  include 'db.php';
  $ex = $_POST['newuser'];
  $user = $_SESSION['id'];
  $sql = "UPDATE users SET username = '$ex' WHERE ID = '$user'";
  mysqli_query($conn, $sql);
  header("Location: ../dashboard.php");
  exit();
}else {
  header("Location: ../dashboard.php");
  exit();
}

 ?>
