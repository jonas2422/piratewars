<?php include 'includes/header.php'; ?>
<script src="js/quit.js" charset="utf-8"></script>
<?php
if (isset($_SESSION['id'])) {
  sleep(2);
  header("Location: dashboard.php");
  exit();
} ?>
<div class="signin">
  <style media="screen">
  .signin{
    background-image: url(galery/sea-of-thieves.jpg);
  }
  </style>
  <div class="boxinsidesignin">
    <h2>Register</h2>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="register" class="signinform" action="includes/registerinc.php" method="post">
            <div class="formcenter">
            <input class="usercheck" type="text" name="username" value="" placeholder="user name"><br>
            <label id="uid">Username is used</label>
            <input class="emailcheck" type="email" name="email" value="" placeholder="email"><br>
            <label id="uem">Email is used</label>
            <input type="password" id="passwordid" name="password" value="" placeholder="password"><br>
            <input type="password" name="passwordtwo" value="" placeholder="repeat password"><br>
            <input type="submit" name="submitreg" class="btn btn-success" value="Register"></input>
            </div>
          </form>

          <div class="extralinks">
          <p style="text-align:center;">or</p>
          <p style="text-align:center;"><a href="signin.php">Sign-in</a></p>
          <p style="text-align:center;"><a href="signin.php">Go back</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
