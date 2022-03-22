<?php
session_start();
require_once "config.php";
$username = $_SESSION['username'];
?>
<table id='carrinhotable'>
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
  
<td>
<img style="max-width:50px;" src="img/img<?php echo $row['img']; ?>"><br>
<?php echo $row["produto"]; ?><br>
<?php echo $row["price"] . " €" ; ?>
</td>

<td>
<input onkeypress='return (event.charCode >= 48 && event.charCode <= 57)' id="quantcar<?php echo $row["produto"];?>" type="text" value='1'>
<button class='quantbut' data-id='<?php echo $row["produto"];?>' style='width:auto;'>Confirmar quantidade</button>
</td>
<td id='grandtotal<?php echo $row["produto"];?>'><?php echo $row["price"] . " €" ; ?></td>

<td><button class='delete' data-id='<?php echo $row["carrinho_id"]; ?>'>Tirar do carrinho.</button></td>

</tr>


<?php
}
}
?>

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
$('.car').load('php/prodtotal.php');
}
});

});
return false;
});
</script>