<?php
include_once "conf.php";

$mapa = $_POST['mapa'];//echo $mapa;
?>

<ol>
<li class='utubeframe'>

<?php if($mapa == 'ancient'){
echo "<img src='img/ancient.webp'>";
} ?>
<?php if($mapa == 'd2'){
echo "<img src='img/dust2.png'>";
} ?> 
<?php if($mapa == 'inferno'){
echo "<img src='img/inferno.png'>";
} ?>
<?php if($mapa == 'mirage'){
echo "<img src='img/mirage.png'>";
} ?>
<?php if($mapa == 'overpass'){
echo "<img src='img/overpass.webp'>";
} ?>
<?php if($mapa == 'train'){
echo "<img src='img/train.webp'>";
} ?>
<?php if($mapa == 'vertigo'){
echo "<img src='img/vertigo.webp'>";
} ?>
</li>
<!--<td><button class='addcart' data-id='id'> <img class='addcartimg' src="img/cart.png"> </button></td>-->



<li>
<?php 
$sql = "SELECT * FROM produtos WHERE mapa='$mapa'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
$prod = $row['produto'];
$price = $row['price'];
$stock = $row['stock'];
$img = $row['img'];
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
var mapa = $(this).data('id2');
var id = $(this).data('id3');

$.ajax({
type: "POST",
url: "php/slideshowchanger.php",
data: {prodname:prodname , mapa:mapa}, // get all form field value in serialize form
success: function(data) {
$('.utubeframe').html(data);
$('.utube2').removeClass('utube2focus');
$('#utube2'+id).addClass('utube2focus');
}
});
});
});
</script>
