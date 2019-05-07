<?php
include 'db.php';
$sql = "SELECT * FROM users ORDER BY wins DESC";
$res = mysqli_query($conn, $sql);
$place = 1;
$brone ='';
while ($row = mysqli_fetch_assoc($res)) {
  if ($place == 1) {
    $brone = 'gol';
  }elseif ($place == 2) {
    $brone = 'silver';
  }elseif ($place == 3) {
    $brone = 'bronze';
  }elseif ($place ==4) {
    $brone = '';
  }
  ?>
  <div class="<?php echo $brone ?> ldb row">
  <div class="col-lg-2">
  <div class="place centerall">
    <h4><?php echo $place; ?></h4>
  </div>
  </div>

  <div class="col-lg-3">
  <div class="user centerall">
    <h4><?php echo $row['username']; ?></h4>
  </div>
  </div>

  <div class="col-lg-3">
  <div class="coins centerall">
    <h4>Gold: <?php echo $row['gold']; ?></h4>
  </div>
  </div>

  <div class="col-lg-2">
  <div class="level centerall">
    <h4>LVL: <?php echo $row['level']; ?></h4>
  </div>
  </div>

  <div class="col-lg-2">
  <div class="wins centerall">
    <h4>Wins: <?php echo $row['wins']/2; ?></h4>
  </div>
  </div>
  </div>
  <?php
  $place++;
}
 ?>
