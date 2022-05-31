<?php
session_start();
require_once "config.php";

$prodname = $_POST['prodname'];

$sql = "SELECT * FROM produtos WHERE item = '$prodname'";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    $prod = $row['item'];
    $price = $row['price'];
    $stock = $row['stock'];
    $img = $row['img'];
?>
<br>
<br>
<table>

<tr id='firstrow'>
<td><img src='img/img<?php echo $img ?>'> </td>
<?php
if ($row["stock"] == '1') {
echo 
"<td class='verde'>Em stock.</td>";
} elseif ($row["stock"] == '2') {
echo 
"<td class='amarelo'>Pouco stock.</td>";
} else {
echo 
"<td class='vermelho'>Fora de stock.</td>";
}?>

<td style='font-weight:bold'><?php echo ' '. $price . '€ p/uni.' ?> </td>
<td><button class='addcart' data-id='<?php echo $row["id"]; ?>'> <img class='addcartimg' src="img/cart.png"> </button></td>
</tr>

<tr>
<th><?php echo $prod ?></th>
</tr>

<tr>
  <td colspan='2'>
    <br><br>
    <p>pasdmdsapomdawsmpoadpow,awppa+ma+gfma+owemf+amw+efawemfp+oamwe+pfma,w+++++++++p+efo++
      ++++amw+++fpo+++akmw+++ep+of++k+aw+++p+eo++fk++pw++e+k++fp++++ak+we++pfo++k++</p>
      
  </td>
  <td colspan='2'>
    <br><br>
    <p>pasdmdsapomdawsmpoadpow,awppa+ma+gfma+owemf+amw+efawemfp+oamwe+pfma,w+++++++++p+efo++
      ++++amw+++fpo+++akmw+++ep+of++k+aw+++p+eo++fk++pw++e+k++fp++++ak+we++pfo++k++</p>
      
  </td>
</tr>

</table>
<?php } ?>


<script>

$(document).ready(function() {
$('.addcart').click(function() {
var addcart = $(this).data('id');

$('#mainupdate').removeClass('blinkonce');

if($('#mainlogin').text() == 'Login'){
  $('#mainlogin').addClass('blinking');
}else{

$.post('php/carrinhocheckprod.php', {
produto: addcart
}, function(response) {
if (response == "stop") {
$('#produtonocarro').show();
$('#produtonocarro').fadeOut(600);
}else{

$.ajax({
type: "POST",
url: "php/addtocart.php",
data: {id:addcart}, // get all form field value in serialize form
success: function(data) {
$("#carrinho").load("php/carrinho.php");
$(".car").load("php/prodtotal.php");
$('#produtoaddcarro').show();
$('#produtoaddcarro').fadeOut(600);
$('#mainupdate').addClass('blinkonce');
}
});
}
});
}
});
return false;
});
</script>