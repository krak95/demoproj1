<?php
session_start();
require_once "config.php";
$username = $_SESSION['username'];
?>

<div class="car">
<?php
$sql1 = "SELECT * FROM carrinho WHERE username = '$username'";
$stmt1 = $con->query($sql1);
$rowcount = $stmt1->num_rows;
if($username != null){
  if($rowcount != null){
?>
<button id='mainupdate'><img src="../img/cart.png" width="50px" height="50px" ></button>
<?php } } ?>
</div>