<script src="../js/validate.js" charset="utf-8"></script>

<?php

  if (isset($_POST['submitreg'])){
    include 'db.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * from users";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] == $email) {
          header ('Location: ../register.php');
        }else{
          if ($row['username'] == $username) {
            header ('Location: ../register.php');
          }else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$hashed')";
            if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header('Location: ../signin.php?register=success');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
          }
        }
      }
    }else {
      $hashed = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$hashed')";
      if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header('Location: ../signin.php?register=success');
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
    }


}
mysqli_close($conn);
 ?>
