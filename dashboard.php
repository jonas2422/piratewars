<?php include 'includes/header.php'; ?>
<?php if (isset($_SESSION['id'])) {
  ?>
  <script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: 'includes/stoplooking.php',
            async:false,
            success: function(){
              console.log('veikia');
            }
        });
    });
  </script>
  <div class="signin">
    <style media="screen">
    .signin{

      background-image: url(galery/signbg.jpg);
    }
    </style>

      <div class="container containerdesign">
        <div class="row duhas">
          <div class="col-lg-7">
            <div class="floatleft">  <div class="userimage inline">
              </div>
              <h4 class="inline liveuser"></h4>
              <button type="button" class="settingsbutton inline btn btn-outline-success">Settings</button>
              <form class="inline" action="includes/logout.php" method="post">
                <button type="submit" name="logout" class="btn btn-outline-danger">Log out</button>
              </form>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="floatright">
            <div class="inline shopbutton">
            <button type="button" class="shopbut btn btn-outline-warning"> shop </button>
            </div>
            <div class="gold inline">
            </div>
            <h2 class="inline amountofgold"></h2>
              </div>
          </div>
        </div>
        <div class="row dahsboard">
          <div class="col-lg-4">
            <div class="stats">
              <div class="">
                <h2 id="lvl"></h2>
                <script type="text/javascript">
                  $(document).ready(function() {
                    $.ajax({
                      method: 'POST',
                      url: 'includes/leveling.php',
                      success: function(level){
                        $('#lvl').html('Level: ' + level);
                      }
                    });
                  });

                </script>
                <?php
                include 'db.php';
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM users WHERE ID = '$id'";
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                  ?><h2>Wins: <?php echo $row['wins'] / 2; ?></h2><?php
                }
                ?>

                <h2>Played: <?php echo $_SESSION['played']; ?></h2>
              </div>
            </div>

          </div>
          <div class="col-lg-4">
            <div class="inventory">
              <div class="">
                <button class="inv btn btn-warning btn-lg" type="button" name="button">Inventory</button>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <script type="text/javascript">
            $(document).ready(function() {
              $('.whenloading').hide();
              $(".match").click(function(){
                var clicked = 1;
                function getData(){
                var xr = $.ajax({
                    url: 'includes/matchmaking.php',
                    success : function(data){
                      console.log(data)
                      if(data == 1){
                        $('.match').show();
                        window.location.href = 'match.php';
                        return false;
                    console.log('is equal to 1 do this')
                  }
                  if(data == 2){
                    $('.whenloading').show();
                    $('.match').hide();
                    $('.stopmatch').click(function(){
                      clicked = 2;

                    });
                    if (clicked == 2) {
                      xr.abort();
                      $.post('includes/stoplooking.php');
                      $('.whenloading').hide();
                      $('.match').show();
                    }else {
                      getData();
                    }


                  }
                    }
                })
              }

              getData();

              });
            });

            </script>
              <div class="startmatch">
                <button type="button" class="match btn btn-success btn-lg">start match</button>
                <div class="whenloading">
                  <div class="loader">

                  </div>
                  <p>looking for the opponent...</p>
                  <button type="button" class="stopmatch btn btn-outline-danger btn-sm">stop</button>
                </div>

              </div>


          </div>
        </div>
        <!-- SETTINGS -->

        <!-- LEADERBOARD -->
        <div class="leaderboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="goback">
                <h2>Leaderboard</h2>
              </div>
            </div>
          </div>
          <?php include 'includes/leaderboard.php'; ?>
        </div>

        <div class="shop">
          <div class="designitem">
          <div class="row">
            <div class="col-lg-4">
                <div class="centershop">
                <div class="userchange">
                  <div class="userchangeimage">
                  </div>
                  <div class="itemdescription">
                    <h4>change username</h4>
                    <h4 class="inline">300</h4><button class="inline btn btn-warning btn-sm buyusername" type="submit" name="button">Buy</button>
                    <p class="errormessage"></p>
                    <div class="dialogbar">
                      <form class="changenameform" action="includes/changeusername.php" method="POST">
                        <input id="ucheck" type="text" name="newuser" value="" placeholder="New name"><br>
                        <input type="submit" name="submit" class="clickchangeuser btn btn-primary btn-sm">
                      </form>
                    </div>

                    <script type="text/javascript">
                      $(document).ready(function() {
                        $( ".dialogbar" ).dialog({
                          autoOpen: false,
                          draggable: false,
                          resizable: false,
                          minHeight: 350,
                          minWidth: 450,
                          closeOnEscape: true,
                          dialogClass: "no-close"

                        });
                        $('.buyusername').click(function(){
                          $.ajax({
                            method: 'post',
                            url: 'includes/checkmoney.php',
                            success: function(data){
                              if (data == 1) {
                                console.log('dialog');
                                $( ".dialogbar" ).dialog( "open" );
                              }else {
                                $('.errormessage').html('Not enough gold');
                              }
                            }
                          })

                        });
                      });

                    </script>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
          <div class="designitem">
          <div class="row">




            <?php
            include 'includes/array.php';
            include 'db.php';
            foreach ($arrays as $key) {
              $string = preg_replace('/\s+/', '', $key['name']);
              $image = 'galery/' . $string . '.jpg';
              ?>
              <div class="col-lg-4">
                  <div class="centershop">
                  <div class="userchange">
                    <div class="<?php echo $string . 'picture' ?>">
                    </div>
                    <style media="screen">
                      <?php echo '.' . $string . 'picture' ?>{
                        background-image: url(<?php echo $image; ?>)!important;
                        width: 200px;
                        height: 150px;
                        background-size: cover;
                        background-position: center;
                      }

                    </style>
                    <div class="itemdescription">
                      <h4><?php echo $key['name']; ?></h4>
                      <h4 class="inline"><?php echo $key['price']; ?></h4><button class="inline btn btn-warning btn-sm <?php echo $string . 'buybutton' ?>" type="submit" name="button">Buy</button>
                      <p id="<?php echo $string . 'error'; ?>" class="errormessage"></p>

                      <script type="text/javascript">
                        $(document).ready(function() {
                          $('.<?php echo $string . 'buybutton' ?>').click(function(){
                            var price = <?php echo $key['price'] ?>;
                            var name = "<?php echo $key['name'] ?>";
                            $.ajax({
                              url: 'includes/buy.php',
                              method: 'post',
                              data : {price : price, name : name},
                              success: function(data){
                                if (data == 1) {
                                  $('#<?php echo $string . 'error'; ?>').html("Not enough gold");
                                }  if (data == 2) {
                                    $('#<?php echo $string . 'error'; ?>').html("Item added to inventory");
                                  }  if (data == 3) {
                                      $('#<?php echo $string . 'error'; ?>').html("You already have this ship");
                                    }
                              }
                            })
                          })
                        });

                      </script>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              // code...
            }
             ?>




            </div>
          </div>
        </div>

        <div class="shopinventory">
          <h2>Inventory</h2>
          <p>NOTE: If you don't see any items please visit shop and buy it</p>
          <p>NOTE: If you can't see item which you bought in inventory reload the page</p>
            <div class="row">
              <?php
              include 'includes/array.php';
              include 'includes/db.php';
              $us = $_SESSION['id'];
              $get = "SELECT * FROM users where ID = '$us'";
              $res = mysqli_query($conn, $get);
              while ($row = mysqli_fetch_assoc($res)) {
              foreach ($arrays as $key) {
                $str = $string = preg_replace('/\s+/', '', $key['name']);

                  if ($row[$str] == "") {
                    ?>
                    <style media="screen">
                      <?php echo '.' . $str . 'hide'; ?>{
                        display: none;
                      }
                    </style>
                    <?php
                  }
                  ?>
                  <div class="col-lg-4 <?php echo $str . 'hide'; ?>">
                    <div class="centershop">
                      <div id="<?php echo $str . 'id' ?>" class="iteminv">
                        <script type="text/javascript">
                        $(document).ready(function() {
                          $('#<?php echo $str . 'id' ?>').click(function(){
                            $(".iteminv").css("border-color", "#ccc");
                            $(".inventoryerror").html("");
                            var name = '<?php echo $key['name']; ?>';
                            $.ajax({
                              url : 'includes/changeitem.php',
                              method: 'post',
                              data : {name : name},
                              success: function(data){
                                $("#<?php echo $str . 'id' ?>").css("border-color", "gold");
                                $("#<?php echo $str .'inverror' ?>").html("Item selected");
                              }
                            })
                          })
                        });

                        </script>
                        <div class="foto <?php echo $str . 'picture' ?>">
                        </div>
                        <div class="invdesc">
                          <h4><?php echo $key['name']; ?></h4>
                          <p id ="<?php echo $str .'inverror' ?>" class="inventoryerror"></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
               ?>
            </div>
        </div>

        <div class="settingsboard">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="settingstext">Settings</h2>

            <div class="centerform">
              <form class="updateform" method="post">
                <div class="formcenter">
                <input style="display: none;" class="oldemail" type="text" name="" value="<?php echo $_SESSION['email']; ?>">
                <input class="updateemail" type="email" name="signemail" value="" placeholder="new email" required><br>
                <input class="oldpassword" type="password" name="oldpassword" value="" placeholder="old password" required><br>
                <input class="newpassword" type="password" name="newpassword" value="" placeholder="new password" required><br>
                  <input class="newpasswordtwo" type="password" name="newpasswordtwo" value="" placeholder="new password" required><br>
                <button class="updatesubmit btn btn-success btn-lg" type="submit" name="submit" class="btn btn-success">Update data</button>
                <h2 class="updated settingstext"></h2>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      </div>
  <?php
}else {
  header('Location: signin.php?error=404');
  exit();
} ?>


<?php include 'includes/footer.php'; ?>
