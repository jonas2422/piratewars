<?php include 'includes/header.php';

if (isset($_SESSION['id'])) {
sleep(1);
  header("Location: dashboard.php");
  exit();
} ?>
<script src="js/quit.js" charset="utf-8"></script>
  <div class="signin">
    <style media="screen">
    .signin{
      background-image: url(galery/signbg.jpg);
    }
    </style>
    <div class="boxinsidesignin">
      <h2>Sign in</h2>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <script type="text/javascript">
              $('.loginbutton').click(function(){
                var loginemail = $('.loginemail').val();
                var loginpassword = $('.loginpassword').val();
                $.ajax({
                  method: 'post',
                  url: 'includes/login.php',
                  data: {signemail : loginemail, password : loginpassword},
                  success : function(){
                    console.log(123);
                    window.location.href = 'dashboard.php';
                    return false;
                  }
                })
              })
            </script>
            <form id="login" class="signinform" action="includes/login.php" method="post">
              <div class="formcenter">
              <input class="loginemail" type="email" name="signemail" value="" placeholder="email"><br>
              <input class="loginpassword" type="password" name="password" value="" placeholder="password"><br>
              <input type="submit" name="submit" class="btn btn-success loginbutton">

              </div>
            </form>

            <div class="extralinks">
            <p style="text-align:center;">or</p>
            <p style="text-align:center;"><a href="register.php">Register</a></p>
            <p style="text-align:center;"><a href="index.php">Go back</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'includes/footer.php'; ?>
