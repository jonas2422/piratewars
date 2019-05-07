<?php
include 'includes/header.php'; ?>
<?php if (!isset($_SESSION['id'])) {
    sleep(2);
  header("Location: dashboard.php");
  exit();
} ?>
<script type="text/javascript">
</script>

<div class="game">

    <div id="container" class="centercanvas">
        <canvas id="canvas" width="580" height="465"></canvas>

            <div class="showformove">
              <div id="opponent_box" class="jumbotron">
                <h2>Opponents turn</h2>
              </div>
            </div>
    <div class="hidebeforemove">
      <div id="question_box" class="jumbotron">
        <div class="answer1q btn btn-success"></div>
        <div class="answer2q btn btn-success"></div>

        <div class="buttondirection button1 btn btn-primary">LEFT</div>
        <div class="buttondirection button2 btn btn-primary">RIGHT</div>
        <div class="buttondirection button3 btn btn-primary">DOWN</div>
        <div class="buttondirection button4 btn btn-primary">UP</div>
      </div>
    </div>




          <div id="gold_amount">
          </div>

          <div id="point_amount">
          </div>

          <div id="finish">
          </div>



  </div>

  <div class="dialogwin">
    <div class="">
      <h3 id="winnername"></h3>
      <h4>And he won</h4>
      <h3 id="prizepool"></h3>
      <button class="btn btn-warning quitmatch">Back</button>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $( ".dialogwin" ).dialog({
      autoOpen: false,
      draggable: false,
      resizable: false,
      minHeight: 400,
      minWidth: 500,
      dialogClass: "no-close",
      modal : true
    });
  });


  </script>
  <div class="vswho">

  <?php
  $serverone = $_SESSION['serverone'];
  $servertwo = $_SESSION['servertwo'];
  $userarray = array();
  $sql = "SELECT * FROM `".$serverone."".$servertwo."`";
  $res = mysqli_query($conn, $sql);
  $vs = array();
  while ($row = mysqli_fetch_assoc($res)){
    array_push($vs, $row['user']);
  }
  echo "<h4>" . $vs[0] . " vs " . $vs[1] . "</h4>";
  ?>
  </div>
  <div class="chat">
    <div class="chattop">
      <h4>chat</h4>
    </div>
    <div class="chattext">

    </div>
    <div class="chatform">
      <script type="text/javascript">
        $(document).ready(function() {
          $('.chattext').scrollTop($('.chattext').height());
          var autoLoad = setInterval(
   function ()
   {
      $('.chattext').load('includes/livechatback.php');
   }, 500);
          $("#test").click(function(){
            console.log(1);
            var msg = $("#message").val();
            var user = "<?php echo $_SESSION['user']; ?>";
            $.ajax({
              type: 'POST',
              url: 'includes/livechat.php',
              data: {msg : msg, user : user},
              success: function(response){
              }
            });
            $("#message").val('');
          });
        });
      </script>
        <textarea id="message" name="name" wrap="hard"></textarea>
        <button type="button" id="test" class="btn btn-outline-success">send</button>
        <?php echo $_SESSION['user'] ?>

    </div>
  </div>

</div>

<?php include 'includes/footer.php'; ?>
