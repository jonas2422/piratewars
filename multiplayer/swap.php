<?php
include '../includes/db.php';
session_start();
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];
$sql = "SELECT * FROM ". $serverone . $servertwo . " WHERE user = '$serverone'";
 $ans = mysqli_query($conn, $sql);
 while ($row = mysqli_fetch_assoc($ans)) {
   echo $row['t'];
     $sqltwo = "SELECT * FROM ". $serverone . $servertwo . " WHERE user = '$servertwo'";
     $res = mysqli_query($conn, $sqltwo);
     while ($rowtwo = mysqli_fetch_assoc($res)) {
       $trueorfalse = $row['t'];
       $trueorfalsetwo = $rowtwo['t'];
       echo $trueorfalsetwo;
       $sql1 = "UPDATE ". $serverone . $servertwo . " SET t ='$trueorfalse' WHERE user = '$servertwo'";
        $sql2 = "UPDATE ". $serverone . $servertwo . " SET t ='$trueorfalsetwo' WHERE user = '$serverone'";
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);
     }
 }
 ?>
