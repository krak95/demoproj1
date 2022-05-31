<?php
session_start();
require_once "config.php";
$email = $_SESSION['email'] ?? null;
$username = $_SESSION['username'] ?? null;
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
<img class='prodimg'  src="img/img<?php echo $row['img']; ?>"><br>
<?php echo $row["item"]; ?><br>
<?php echo $row["price"] . " € p/uni." ; ?>
</td>
<td>
<input class='quantinput' data-id='<?php echo $row["id_prod"];?>' onkeypress='return (event.charCode >= 48 && event.charCode <= 57)' id="quantcar<?php echo $row["id_prod"];?>" type="text" value='<?php echo $row["quantidade"];?>'>
</td>
<td id='grandtotal<?php echo $row["id_prod"];?>'><?php echo $row["price_final"] . " €" ; ?></td>
<td><button class='delete' data-id='<?php echo $row["carrinho_id"]; ?>'>Retirar</button></td>

</tr>


<?php
}
}
?>
<button id='finalencomenda'>Finalizar encomenda.</button>
<button id='deletecarrinho'>DELETE</button>
</table>

<div id='lastdiv'></div>


<script>

$(document).ready(function() {
  $('.quantinput').keyup(function() {
    var id = $(this).data('id');
    var quantcar = $('#quantcar'+id).val();
$.ajax({
type: "POST",
url: "php/carrinhoquant.php",
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


<script>
  
  $(document).ready(function(){
    $('#finalencomenda').click(function(){
      var name = '<?php echo $username ?>';
      var email = '<?php echo $email ?>';
      
$.ajax({
type: "POST",
url: "php/encomenda.php",
data: {}, // get all form field value in serialize form
success: function(data) {
  alert('yes');
  $.get('php/maily.php',function(data){
    var body = data;

$("#carrinhotable").remove();
$("#carrinho").load("php/carrinho.php");
$(".car").load("php/prodtotal.php");
  $.ajax({
type: "POST",
url: "php/mail.php",
data: {name:name, email:email, body:body}, // get all form field value in serialize form
success: function(data) {
}
});
});
}
});
});

});
</script>

<script>
$(document).ready(function(){
$('#deletecarrinho').click(function(){

$.ajax({
type: "POST",
url: "php/deletecarrinho.php",
data: {}, // get all form field value in serialize form
success: function(data) {
$('#carrinhotable').closest('table').fadeOut(200,function(){
$(this).remove();
});

$(".car").load("php/prodtotal.php");
}
});

});
});
</script>