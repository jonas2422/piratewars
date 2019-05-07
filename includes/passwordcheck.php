<?php
include 'db.php';
$exists = $_POST['ex'];
$em = $_POST['em'];
$sql = "SELECT * FROM users WHERE email = '$em'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
  $hash = password_verify($exists, $row['password']);
  if ($hash == false) {
    echo json_encode('');
  }else {
    echo json_encode(true);
  }
}
 ?>
