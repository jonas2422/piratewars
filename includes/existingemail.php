<?php
include 'db.php';
$exists = $_POST['ex'];
$sql = "SELECT * FROM users WHERE email = '$exists'";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) == 1){
  echo json_encode('');
}else {
  echo json_encode(true);
}
 ?>
