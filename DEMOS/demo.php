<?php
include_once 'php/conf.php';
?>
<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<head>
<link rel="stylesheet" href="css/css.css"/>
<script type='text/javascript'  src='js/js.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>

<div class='topmenu' id='a'>
<ol>
<li>
<button id='loscalmos' class='loscalmos' onclick='loscalmos()'> LosCalmos   </button>
<button id='toplogin' class='toplogin' onclick='toplogin()'>   Login   </button>
<button id='slayer' class='slayer' onclick='slayer()'>   Slayer  </button>
</li>
</ol>
</div>

<div class='index' id='index'>
     
<ul>

<li>
<button class='csgoindex' id='csgoindex' onclick='csgo()'></button>
<h1 id='csgotext'>ZORLAK UTUBE VIDEOS
<br>BASIC SMOKES
<br>ADVANCED SMOKES
</h1>
<script>
     $(document).ready(function(){
          $('#csgotext').hide();
$('#csgoindex').hover(function(){
$('#csgotext').slideDown(800);
},function(){
     
$('#csgotext').slideUp(800);
});
     });
</script>

</li>

<li>
<button class='lolindex' id='lolindex' onclick='lol()'></button>
</li>
<li>
<button>
</button>
</li>
<li>
<button>
</button>
</li>
</ul>
</div>

<div id='csgo'  class='csgo'>
<div class='ajaxload' id='ajaxload'>

<ol>
<?php 
$sql = 'SELECT DISTINCT mapa FROM csgo';
$state = $conn -> query($sql);
while ($row = $state->fetch_assoc()){
?>

<li class='ajaxloadrow' id='ajaxloadrow<?php echo $row['mapa'];?>' data-id='<?php echo $row['mapa'];?>' data-id2='<?php echo $row['mapa']; ?>'>

<?php if($row['mapa'] == 'ancient'){
echo "Ancient";
} ?>
<?php if($row['mapa'] == 'd2'){
echo "Dust2";
} ?> 
<?php if($row['mapa'] == 'inferno'){
echo "Inferno";
} ?>
<?php if($row['mapa'] == 'mirage'){
echo "Mirage";
} ?>
<?php if($row['mapa'] == 'overpass'){
echo "Overpass";
} ?>
<?php if($row['mapa'] == 'train'){
echo "Train";
} ?>
<?php if($row['mapa'] == 'vertigo'){
echo "Vertigo";
} ?>
<br>
<?php if($row['mapa'] == 'ancient'){
echo "<img src='img/ancient.webp'>";
} ?>
<?php if($row['mapa'] == 'd2'){
echo "<img src='img/dust2.png'>";
} ?> 
<?php if($row['mapa'] == 'inferno'){
echo "<img src='img/inferno.png'>";
} ?>
<?php if($row['mapa'] == 'mirage'){
echo "<img src='img/mirage.png'>";
} ?>
<?php if($row['mapa'] == 'overpass'){
echo "<img src='img/overpass.webp'>";
} ?>
<?php if($row['mapa'] == 'train'){
echo "<img src='img/train.webp'>";
} ?>
<?php if($row['mapa'] == 'vertigo'){
echo "<img src='img/vertigo.webp'>";
} ?>

</li>
<?php } ?>
</ol>
<script>
$(document).ready(function(){
$('.ajaxloadrow').click(function(){
var id = $(this).data('id');
var mapa = $(this).data('id2');
$.ajax({
type: "POST",
url: "php/slideshowcsgo.php",
data: {mapa:mapa}, // get all form field value in serialize form
success: function(data) {
$('.slideshow').html(data);
$('.ajaxloadrow').removeClass('ajaxloadfocus');
$('#ajaxloadrow'+id).addClass('ajaxloadfocus');
}
});
}); 
});
</script>
</div>
</div>

<div id='lol'  class='lol'>
<div class='ajaxloadlol' id='ajaxloadlol'>

<ol>
<?php 
$sql = 'SELECT DISTINCT tipo FROM lol';
$state = $conn -> query($sql);
while ($row = $state->fetch_assoc()){
?>

<li class='ajaxloadrowlol' id='ajaxloadrowlol<?php echo $row['tipo'];?>' data-id='<?php echo $row['id'];?>' data-id2='<?php echo $row['tipo']; ?>'>
<?php if($row['tipo'] == 'profjajao'){
echo "profjajao";
} ?>
<br>
<?php if($row['tipo'] == 'profjajao'){
echo "<img src='img/pjajao.png'>";
} ?>
</li>

<?php } ?>
</ol>
<script>
$(document).ready(function(){
$('.ajaxloadrowlol').click(function(){
var id = $(this).data('id');
var mapa = $(this).data('id2');
$.ajax({
type: "POST",
url: "php/slideshowlol.php",
data: {mapa:mapa, id:id}, // get all form field value in serialize form
success: function(data) {
$('.slideshow').html(data);
$('.ajaxloadrowlol').removeClass('ajaxloadfocuslol');
$('#ajaxloadrowlol'+id).addClass('ajaxloadfocuslol');
}
});
}); 
});
</script>
</div>
</div>

<div id='slideshow' class='slideshow'></div>
<div class='backshadow'></div>

<div class='user' id='user'>
<div class='login'>
<br><br>
<h2>LOGIN</h2><br><br>
<label for="id">Nome de usuário:</label><br>
<input type="text" class='id' id='id'><br><br><br><br>
<label for="pass">Palavra-pass:</label><br>
<input type="password" class='pass' id='pass'><br><br><br><br>

<button class='loginbut'>Entrar</button>
<br>
</div>
<div class='registo'>
<br><br>
<h2>Registo</h2><br><br>
<label for="id">Nome de usuário:</label><br>
<input type="text" class='id' id='id'><br><br><br><br>
<label for="pass">Palavra-pass:</label><br>
<input type="password" class='pass' id='pass'><br><br><br><br>

<button class='regbut'>Registo</button>
<br>
</div>
</div>

</body>

</html>