<?php
session_start();
require_once "config.php";
$username = $_SESSION['username'];
?>
<table id='carrinhotable'>
<tr>
<th>produto:</th>
<th>quantidade:</th>
<th>price:</th>
<th>imagem:</th>
<th>total:</th>
<th>deletebutton</th>
</tr>
<?php 
$sql = "SELECT * from carrinho WHERE username = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc())
{
if ($username = $row['username']){
?>


<tr>
<td><?php echo $row["produto"]; ?></td>
<td><?php echo $row["quantidade"]; ?></td>
<td><?php echo $row["price"] . " €" ; ?></td>
<td><img style="max-width:50px;" src="img/img<?php echo $row['img']; ?>"></td>
<td><?php echo $row["price_final"] . " €" ; ?></td>
<td><button class='delete' data-id='<?php echo $row["carrinho_id"]; ?>'><?php echo $row["carrinho_id"]; ?></button></td>

</tr>
<?php
}
}
?>

<tr>
  <?php
$stmt = $con->prepare("SELECT SUM(quantidade) as prodtotal, SUM(price) as pricetotal FROM carrinho WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()){ 
$sum = $row['prodtotal'];
$sum1 = $row['pricetotal'];
?>  
<p class='prodtotal'>
<?php echo '<br>'. $sum .'->'. $sum1 . '€';} ?> 
<p>
</tr>
</table>