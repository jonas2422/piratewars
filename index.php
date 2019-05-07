<?php include 'includes/header.php'; ?>
<?php
sleep(2);
if (isset($_SESSION['id'])) {
  header("Location: dashboard.php");
  exit();
} ?>
<section>
  <div class="firstcreen">
    <div class="firstcreenbox">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 boxlinerigt">
            <div class="gamedescription">
              <div class="padding">
                <h1>Game on!</h1>
                <p class="lead">You think you know a lot? Try your knowledge here against others in the most buetiful web browser game ever!</p>
                  <div class="centerbtns">
                  <div>
                  <button type="button" name="signin" class="btnwidth btn btn-success sign">Sign in</button>
                  <script type="text/javascript">
                    $('.sign').click(function(){
                      window.location.href = 'signin.php';
                      return false;
                    });

                  </script>
                  <p>or</p>
                  <button type="button" name="button" class="btnwidth btn btn-success regi">Register</button>
                  <script type="text/javascript">
                  $('.regi').click(function(){
                    window.location.href = 'register.php';
                    return false;
                  });
                  </script>
                  </div>
                  </div>
            </div>
            </div>
          </div>
          <div class="col-lg-6 boxlineleft">
            <div class="gamedescription">
              <div class="padding">
                <h1>About</h1>
                <p class="lead">Pirate wars is a fun competitive learning game, designed to help you get to know about Denmark culture and history more as well as make some new friends while playing it online. For every right answer you get one point. If you answer incorrect, you get no point and you have to skip your turn, giving a better chance for your opponent to win. Who ever answers all the questions first and reaches the finish line - wins!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/header.php'; ?>
