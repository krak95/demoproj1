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
<td>
<input id="quantcar<?php echo $row["produto"];?>" type="text" value='1'>
<button class='quantbut' data-id='<?php echo $row["produto"];?>' style='width:auto;'>Confirmar quantidade</button>
</td>
<td><?php echo $row["price"] . " €" ; ?></td>
<td><img style="max-width:50px;" src="img/img<?php echo $row['img']; ?>"></td>
<td id='grandtotal<?php echo $row["produto"];?>'></td>
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

<script>

$(document).ready(function() {
  $('.quantbut').click(function() {
    var id = $(this).data('id');
    var quantcar = $('#quantcar'+id).val();
$.ajax({
type: "POST",
url: "php/CARRINHOquant.php",
data: {quant:quantcar, id:id}, // get all form field value in serialize form
success: function(data) {
$("#grandtotal"+id).html(data);
}
});

});
return false;
});
</script>