<?php
session_start();
include 'db.php';
$user = $_SESSION['user'];
mysqli_query($conn, "DELETE FROM matchmaking WHERE user = '$user'");
 ?>
