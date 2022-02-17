<?php
session_start();
require_once "config.php";
$username = $_SESSION['username'];
$sql1 = mysqli_query($con,"SELECT SUM(quantidade) as prodtotal, SUM(price) as pricetotal FROM carrinho WHERE username = '$username'");
$row = mysqli_fetch_assoc($sql1); 
$sum = $row['prodtotal'];
$sum1 = $row['pricetotal'];
?>  
<p class='prodtotal'>
<?php echo '<br>'. $sum .'->'. $sum1 . '€'; ?> 
<p>