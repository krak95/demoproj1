<?php
session_start();
require_once "config.php";
$username = $_SESSION['username'] ?? null;
?>
<div class="car">
<?php


$sql1 = "SELECT * FROM carrinho WHERE username = '$username'";
$stmt1 = $con->query($sql1);
$rowcount = $stmt1->num_rows;
if($username != null){
if($rowcount != null){
$stmt = $con->prepare("SELECT SUM(quantidade) as prodtotal, SUM(price_final) as pricetotal FROM carrinho WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()){ 
$sum = $row['prodtotal'];
$sum1 = $row['pricetotal'];
?>  
<?php echo 'Items:'. $sum .'<br>'. 'Total:'.$sum1 . '€'.'<br>';} ?>
<img src="img/cart.png" width="50px" height="50px" >
<?php } else {
echo '<img src="img/cart.png" width="50px" height="50px" >';
} 
} else {
echo '<img src="img/cart.png" width="50px" height="50px" >';
}
?>
</div>