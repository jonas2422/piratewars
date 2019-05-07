<?php
session_start();
include 'db.php';
$iftrue = 0;
$user = $_SESSION['user'];
$sqlsearch = "SELECT * FROM matchmaking where user = '$user'";
$ressearch = mysqli_query($conn, $sqlsearch);
$sqlboat = "SELECT * FROM users where username = '$user'";
$sqlboat = mysqli_query($conn, $sqlboat);
$item ='';
while($row = mysqli_fetch_assoc($sqlboat)) {
  $item = $row['item'];
}
if (mysqli_num_rows($ressearch) < 1) {
  $sqlinset = "INSERT into matchmaking (user) values ('$user')";
  if (mysqli_query($conn, $sqlinset)) {
  //echo "New record created successfully";
  }

}
  $sql = "SELECT * FROM matchmaking
  LIMIT 2";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 1) {
    //CREATE match

    $table= array();
    while ($row = mysqli_fetch_assoc($result)) {
      array_push($table, $row['user']);

    }
    $sqlmatch = "CREATE TABLE `".$table[0]."".$table[1]."`(
  id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user VARCHAR(255) NOT NULL,
  x INT(255),
  y INT(255),
  t VARCHAR(255),
  boat VARCHAR(255)
  )";
  mysqli_query($conn, $sqlmatch);
    sleep(1);
    $sqlmatchstart = "INSERT INTO `".$table[0]."".$table[1]."`(user, boat)
  VALUES ('$user', '$item')";

  mysqli_query($conn, $sqlmatchstart);
  $sqlonex = "UPDATE `".$table[0]."".$table[1]."` SET x = '100', y= '200' WHERE ID = '1'";
    $sqltwox = "UPDATE `".$table[0]."".$table[1]."` SET x = '100', y= '270' WHERE ID = '2'";
    mysqli_query($conn, $sqlonex);
    mysqli_query($conn, $sqltwox );
  //ISMETA IS matchmaking
    mysqli_query($conn, "DELETE FROM matchmaking WHERE user = '$user'");
    $iftrue = 1;
    $_SESSION['serverone'] = $table[0];
    $_SESSION['servertwo'] = $table[1];

  }else {
    $iftrue = 2;
  }
  echo $iftrue;




 ?>
