<?php
session_start();
require_once "config.php";
$username = $_SESSION['username'];
?>

<table id='carrinhotable'>
<tr>
    <td>produto:</td>
    <td>quantidade:</td>
    <td>price:</td>
    <td>imagem:</td>
    <td>total:</td>
    <td>deletebutton</td>
</tr>
<?php 
$sql = "SELECT * from carrinho WHERE username = '$username'";
$result = $con->query($sql);
if($result){}
while ($row = $result->fetch_assoc())
{
if ($username = $row['username']){
?>

 
<tr>
<td class='loadcarrinho'><?php echo $row["produto"]; ?></td>
<td class='loadcarrinho'><?php echo $row["quantidade"]; ?></td>
<td class='loadcarrinho'><?php echo $row["price"] . " €" ; ?></td>
<td class='loadcarrinho'><img style="max-width:50px;" src="img/img<?php echo $row['img']; ?>"></td>
<td class='loadcarrinho'><?php echo $row["price_final"] . " €" ; ?></td>
<td class='loadcarrinho'><button class='delete' data-id='<?php echo $row["carrinho_id"]; ?>'><?php echo $row["carrinho_id"]; ?></button></td>

</tr>

<?php
}
}
?>
</table>
<script>
$(document).ready(function(){

// Delete 
$('.delete').click(function(){
var el = this;

// Delete id
var deleteid = $(this).data('id');

var confirmalert = confirm("Are you sure?");
if (confirmalert == true) {
// AJAX Request
$.ajax({
url: 'php/deletecar.php',
type: 'POST',
data: { id:deleteid },
success: function(response){
if(response == 1){
// Remove row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800,function(){
$(this).remove();
});
}else{
alert('Invalid ID.');
}

}
});
return true;
}

});

});
</script>