<?php
session_start();
if (isset($_POST['submit'])){
  include 'db.php';
  $em = $_POST['signemail'];
  $psw = $_POST['password'];
  $sql = "SELECT * from users where email = '$em'";
  $result = mysqli_query($conn, $sql);
  if ($result < 1) {
    // error
    header('Location: ../signin.php?login=fail');
    exit();
  }else {
    if ($row = mysqli_fetch_assoc($result)) {
      $hash = password_verify($psw, $row['password']);
      if ($hash == false) {
        // error
        header('Location: ../signin.php?login=fail');
        exit();
      }else {
        // log in here
        $_SESSION['id'] = $row ['ID'];
        $_SESSION['user'] = $row ['username'];
        $_SESSION['email'] = $row ['email'];
        $_SESSION['password'] = $row ['password'];
        $_SESSION['gold'] = $row['gold'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['wins'] = $row['wins'];
        $_SESSION['played'] = $row['played'];
        $_SESSION['imagefolder'] = $_row['imagefolder'];
        $_SESSION['image']=$_row['image'];
        header('Location: ../dashboard.php?login=success');
        exit();
      }
    }
  }

};
