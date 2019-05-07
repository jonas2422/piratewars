<?php
session_start();
include 'db.php';
$serverone = $_SESSION['serverone'];
$servertwo = $_SESSION['servertwo'];

$sql = "SELECT * FROM chat WHERE user = '$serverone' OR user = '$servertwo' ORDER BY id DESC";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)){
  echo '<div class="chatpost">';
  echo '<h5>' .$row['user'] . '</h5>' . '<p>' . $row['message'] . '</p>';
  echo '</div>';
}
?>
