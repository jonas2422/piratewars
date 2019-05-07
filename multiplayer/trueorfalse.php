<?php
session_start();
include '../includes/db.php';
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];
  $sqlone = "UPDATE ". $serverone . $servertwo . " SET t ='true' WHERE id = '1'";
  $sqltwo = "UPDATE ". $serverone . $servertwo . " SET t ='false' WHERE id = '2'";
  mysqli_query($conn, $sqlone);
  mysqli_query($conn, $sqltwo);

 ?>
