<?php
include_once "conf.php";

$mapa = $_POST['mapa'];//echo $mapa;
?>

<ol>
<li class='utubeframe'>

<?php if($tipo == 'profjajao'){
echo "<img src='img/pjajao.png'>";
} ?>
</li>
<!--<td><button class='addcart' data-id='id'> <img class='addcartimg' src="img/cart.png"> </button></td>-->



<li>
<?php 
$sql = "SELECT * FROM lol WHERE tipo='$tipo'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
$prod = $row['produto'];
$utube = $row['utube'];
$id = $row['id'];
?>
<button class='utube2' id='utube2<?php echo $id ?>' data-id='<?php echo $prod ?>'  data-id2='<?php echo $mapa ?>' data-id3='<?php echo $id ?>'><?php echo $prod ?></button>

<?php } ?>
</li>
</ol>

<script>
$(document).ready(function(){

$('.utube2').click(function(){    
var prodname = $(this).data('id');
var tipo = $(this).data('id2');
var id = $(this).data('id3');

$.ajax({
type: "POST",
url: "php/slideshowchangerlol.php",
data: {prodname:prodname , tipo:tipo}, // get all form field value in serialize form
success: function(data) {
$('.utubeframe').html(data);
$('.utube2').removeClass('utube2focus');
$('#utube2'+id).addClass('utube2focus');
}
});
});
});
</script>
