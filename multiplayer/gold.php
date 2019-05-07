<?php
session_start();
include '../includes/db.php';
$amount = $_POST['amount'];
$winner = $_POST['winner'];
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];
$username = $_POST['username'];
$sql = "SELECT * FROM ". $serverone . $servertwo . " WHERE id = '$winner'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
  $win = $row['user'];
  echo $win;
  $sql = "SELECT * FROM users where username = '$win'";
  $ans = mysqli_query($conn, $sql);
  while ($rowtwo = mysqli_fetch_assoc($ans)) {
    $win = $rowtwo['wins'] + 1;
    $gold = $rowtwo['gold'] +  ($amount) / 2;
    $sql = "UPDATE users SET gold = '$gold', wins = '$win' WHERE username = '$username'";
    mysqli_query($conn, $sql);
  }
}
 ?>
