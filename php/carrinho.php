<?php
require_once "config.php";
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