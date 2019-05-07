<?php
session_start();
include 'db.php';
$name = $_POST['name'];
$price = $_POST['price'];
$user = $_SESSION['id'];
$string = preg_replace('/\s+/', '', $name);

$sql = "SELECT * FROM users WHERE ID = '$user'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
  if ($row['gold'] < $price) {
    echo 1;
  }else {
    if ($row[$string] == "") {
      $sql = "UPDATE users SET " . $string . " = '$name' WHERE ID = '$user'";
      mysqli_query($conn, $sql);
      $gold =  $row['gold'] - $price;
      $money = "UPDATE users SET gold = '$gold' Where ID ='$user'";
      mysqli_query($conn, $money);
      echo 2;
    }else {
      echo 3;
    }
  }
}
 ?>
