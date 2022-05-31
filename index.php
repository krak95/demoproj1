<?php
session_start();
require 'php/config.php';
require 'php/avatarcheck.php';
$name = $_SESSION['name'] ?? null;
$email = $_SESSION['email'] ?? null;
$username = $_SESSION['username'] ?? null;
$admin = $_SESSION['admin'] ?? null;
$password = $_SESSION['password'] ?? null;
$avatar = $_SESSION['avatar'] ?? null;
?>

<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<head>

<title>LosCalmos</title>

<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<link rel="stylesheet" type="text/css" href="css/mobilecss.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
</head>


<body>

<div id="maindiv">
<ol>
<li>
<button id='maineditor'>LosCalmos</button>
<button id='mainlogin'>Login</button>
<button id='mainupdate' class="car prodtotal">
<?php


$sql1 = "SELECT * FROM carrinho WHERE username = '$username'";
$stmt1 = $con->query($sql1);
$rowcount = $stmt1->num_rows;
if($username != null){
if($rowcount != null){
$stmt = $con->prepare("SELECT SUM(quantidade) as prodtotal, SUM(price_final) as pricetotal FROM carrinho WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()){ 
$sum = $row['prodtotal'];
$sum1 = $row['pricetotal'];
?>  
<?php echo 'Items:'. $sum .'<br>'. 'Total:'.$sum1 . '€'.'<br>';} ?>
<img src="img/cart.png" width="50px" height="50px" >
<?php } else {
echo '<img src="img/cart.png" width="50px" height="50px" >';
} 
} else {
echo '<img src="img/cart.png" width="50px" height="50px" >';
}
?>
</button>
</li>
</ol>
</div>

<!--ALERT MSG-->
<div class="insertTxt">Adicionado com sucesso!</div>
<div class="preenchatxt">Preencha os campos!</div>
<div class="existingprod">Produto já existe na base de dados!</div>
<div class='referror'>Por favor, apague o campo referência! Este campo será automaticamente preenchido.</div>
<div class='loginfirst'>Entre na conta primeiro.</div>



<div id="emaildiv">
<!--- emaildiv--->

<div class="div_contato">

<form action="php/mail.php" method="post">

<h2>Contato</h2>

<h1>Nome:</h1><br>
<input type="text" name="name" value="<?php echo "$name"; ?>"><br>

<h1>Email:</h1><br>
<input type="text" name="email" value="<?php echo "$email"; ?>"><br>

<h1>Subject:</h1><br>
<input type="text" id="contsub" name="subject"><br>

<h1>Mensagem:</h1><br><br>
<textarea placeholder="Escreva aqui a sua mensagem." name="body"></textarea><br>
<button  type="submit"> Enviar</button>

</form>

</div>

</div>

<div id=registodiv>
<!-- registodiv -->

<form action="javascript:void(0)" method="POST" id="regist">
<script>
$(document).ready(function($) {
$('#regist').submit(function(e) {
if ($('#renam').val() === '') {
$('#renamempty').show();
$('#renamempty').fadeOut(2000);
}
if ($('#reguser').val() === '') {
$("#reguserempty").show();
$('#reguserempty').fadeOut(2000);
}
if ($('#regpass').val() === '') {
$('#regpassempty').show();
$('#regpassempty').fadeOut(2000);
}
if ($('#regmail').val() === '') {
$('#regmailempty').show();
$('#regmailempty').fadeOut(2000);
}

$.post('php/checkuser.php', {
username: $('#reguser').val()
}, function(response) {
if (response == "false") {
$('#userexist').show();
$('#userexist').fadeOut(2000);
}

$.post('php/checkmail.php',{
email: $('#regmail').val()
}, function(response){
if (response == "false") {
$('#invalidmail').show();
$('#invalidmail').fadeOut(2000);
}

else if ($('#renam').val() != 0 && $('#reguser').val() != 0 && $('#regpass').val() != 0 && $('#regmail').val() != 0) {
$.ajax({
type: "POST",
url: "php/regist.php",
data: $('#regist').serialize(), // get all form field value in serialize form
success: function(data) {
window.location.href = 'index.php';
}
});
}
});

});
});
return false;
});
</script>
<div class="div_reg">

<h2>Registration</h2>


<h1>Nome:</h1><br>
<input type="text" name="name" id="renam" placeholder="Name">
<label for='renamempty' id='renamempty'>Preencha o campo, por favor!</label><br>

<h1>Utilizador:</h1><br>
<input type="text" name="username" id="reguser" placeholder="Username">
<label for='userexist' id='userexist'>Utilizador já existe!</label>
<label for='reguserempty' id='reguserempty'>Preencha o campo, por favor!</label><br>

<h1>Password:</h1><br>
<input type="password" name="password" id="regpass" placeholder="Password">
<label for='regpassempty' id='regpassempty'>Preencha o campo, por favor!</label><br>

<h1>Email:</h1><br>
<input type="text" name="email" id="regmail" placeholder="Email">
<label for='invalidmail' id='invalidmail'>Email inválido!</label>
<label for='regmailempty' id='regmailempty'>Preencha o campo, por favor!</label><br>

<button type="submit">Registar</button>

</div>
</form>
</div>
<div id="logindiv">
<!-- LOGIN -->

<?php
if($username == null){
echo"
<button id='mainregisto'>Criar conta</button>";
}?>

<?php
if ($username == '') {
echo "

<form action='javascript:void(0)' method='POST' id='formlog'>

<script>

$(document).ready(function($){
$('#formlog').submit(function(e){

if ($('#username').val() === ''){
$('#idvazio').fadeIn(555);
$('#idvazio').fadeOut(2000);
return false;
}else{
$.post('php/checkuser.php', {
username: $('#username').val()
}, function(response) {
if (response == 'true') {
$('#wrongcred').show();
$('#wrongcred').fadeOut(2000);
return false;
}
if ($('#password').val() === '') {
$('#passvazio').fadeIn(555);
$('#passvazio').fadeOut(2000);
return false;
}else{
$.post('php/checkpass.php', { username: $('#username').val(), password: $('#password').val()}, function(response) {
if (response == 'yes') {
$.ajax({
type:'POST',
url: 'php/login.php',
data: $('#formlog').serialize(), // get all form field value in serialize form
success: function(data){
window.location.href = 'index.php';
}

});
}else{  $('#wrongcred').show();
$('#wrongcred').fadeOut(2000);}
});
}
});
}
});
return false;
});
</script>


<div class='div_login'>
<br>
<h2>Login</h2>
<br>
<br>
<h1>Utilizador:</h1>
<br>
<input type='text' name='username' class='textbox' id='username' placeholder='Utilizador'>
<label for='idvazio' id='idvazio'>Preencha o campo, por favor!</label>
<br>
<h1>Password:</h1>
<br>
<input type='password' name='password' class='textbox' id='password' placeholder='Password'>
<label for='wrongcred' id='wrongcred'>Credenciais erradas!</label>
<label for='passvazio' id='passvazio'>Preencha o campo, por favor!</label>
<br>
<br>
<button type='submit'>Entrar</button>
</div>
</form>
</div>

<script>
$(document).ready(function() {
$('#footer').hide();
});
</script>

";
} else {
?>

<script>
$(document).ready(function() {
$('#mainlogin').click(function() {

$('#mainlogin').addClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').addClass('footeractive');
$('#backcurtain').show();
$('#foottable').show();
});
$('html').click(function(){
$('#footer').removeClass('footeractive');
});
$('#footer').click(function(event){
event.stopPropagation();
});
});
</script>


<?php
}
?>


</div>



<script>
$(document).ready(function(){
$('#showeditor').val(0);
$('#showeditor').click(function(){
if ($('#showeditor').val() == 0){
$('#editoradmin').show();
$('#showeditor').val(1);
}else{
$('#editoradmin').hide();
$('#showeditor').val(0);
}
});
});
</script>

<?php if ( $admin == 1){ ?><button id='showeditor'>Editor</button><?php } ?>

<div style='display:none;' id='editoradmin'>
<div id="fixeddiv">
<script>
$(document).ready(function() {
$('#but-add').click(function() {
var iprod = $('.iprod').val();
var iprice = $('.iprice').val();
var istock = $('.istock').val();
if ($('#iproduto').val().length === 0 || $('#iprice').val().length === 0) {

$("#preenchatxt").show();
$('#preenchatxt').fadeOut(900);
return false;

}

$.ajax({
type: "POST",
url: "php/insert.php",
data: {keyprod:iprod, keyprice:iprice, keystock:istock}, // get all form field value in serialize form
success: function(data) {
$(".forload").load("php/show.php");
$("html, body").animate({
scrollTop: $(document).height() - $(window).height()
});
}
});
});
return false;
});
</script>

<script>
$(document).ready(function($) {
$('#but-up').click(function(e) {
var iprod = $('.iprod').val();
var iref = $('.iref').val();
var imapa = $('.imapa').val();
var istock = $('.istock').val();
var iutube = $('.iutube').val();
if ($('#iref').val().length === 0) {

$("#preenchatxt").show();
$('#preenchatxt').fadeOut(900);
return false;

}
$.ajax({
type: "POST",
url: "php/update.php",
data: {keyprod:iprod, keyprice:iprice, keystock:istock}, // get all form field value in serialize form
success: function(data) {
$(".forload").load("php/show.php");
}
});
return false;
});
});
</script>

<ul id="fixedinsert">
<li>
<label id='labelproduto'>Produto:</label>
<input autocomplete="off" type="text" name="produto" id="iproduto" class="iprod">
</li>

<li>
<label id='labelprice'>Price:</label>
<input autocomplete="off" type="text" name="price" id="iprice" class="iprice" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
</li>

<li>
<button type="submit" id='but-add' value="Adicionar">Adicionar</button>
<button type="submit" id='but-up' value="Modificar">Modificar</button>
</li>
<li>
<select id='istock' class="istock" name="stock">
<option value="1">Em stock.</option>
<option value="2">Pouco stock.</option>
<option value="3">Fora de stock.</option>
</select>
</li>
<li>
<form method='post' action='php/deleteall.php'>
<button  type='submit' id='but-del' value='deleteall'>Apagar tudo</button>
</form>
</li>
<input type='text' id='byid' name='searchref' placeholder='Escreva ID procurar.'>
</form>

</ul>
</div>

</div>
<!-- editordiv-->
<div id="editordiv">

<script>
$(document).ready(function() {
$('#byname').on('keyup', function(event) {

var name = $('#byname').val();

$.ajax({
type: "POST",
url: "php/search.php",
data: {search:name}, // get all form field value in serialize form
success: function(data) {
$(".forload").html(data);
}
});
});
});
</script>
<script>
$(document).ready(function() {
$('#byid').on('keyup', function(event) {
var id = $('#byid').val();

$.ajax({
type: "POST",
url: "php/searchref.php",
data: {searchref:id}, // get all form field value in serialize form
success: function(data) {
$(".forload").html(data);
}
});
});
});
</script>
<br>

<div class='searchbar byname'>
<ol>
<li>
<button class='droplist' id='droplist'></button>
</li>
<li>
<input id='byname' type="text" name="search" placeholder="Escreva o nome procurar.">
</li>
</ol>
</div>
<br>
<br>
<script>
$(document).ready(function(){
$('#droplist').click(function(){
$('.listdropped').addClass('listdroppedactive');
$('.backcurtain').show();
});
$('html').click(function(){
$('.listdropped').removeClass('listdroppedactive');
$('.backcurtain').hide();
});

$('#droplist , #listdropped, #mainlogin').click(function(event){
event.stopPropagation();
});
});
</script>

<div class='lojaflex'>
<div class='filterlist'>
<ul>
<li>
<button class='filterprice' id='filterpriceasc'>Preço &uarr;</button>
<button class='filterprice' id='filterpricedesc'>Preço &darr;</button>
</li>
<li>
olá
</li>
<li>
olá
</li>
<li>
olá
</li>
<li>
olá
</li>
<li>
olá
</li>
<li>
olá
</li>
<li>
olá
</li>
<li>
olá
</li>
<li>
olá
</li>
</ul>
</div>
<div class="forload">
<table class="insertable1">


<?php 

$sql = "SELECT * FROM produtos";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {


?>
<tr class='olitem' data-id='<?php echo $row["item"];?>'  id='<?php echo $row['item']; ?>'>

<td class='firstchild' data-id='<?php echo $row['img']?>'><img src='img/img<?php echo $row['img']?>'> 

<?php if ($admin == 1){?><br>
REF: <?php
echo $row['id']; }?>
<?php if ($row['img'] == null){ ?>
<?php if ($admin == 1){ ?>
<form action="php/imgupload.php" method="post" enctype="multipart/form-data">
<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
<input class='inputfile1' id='file1' type="file" name="file">
<label for="file1">(imagem para clique) Avatar.</label>
<button class='upload' type="submit" name="upload">Upload</button>
</form>
<?php } 

}else{ ?>
<?php if ($admin == 1){ ?>
<form method='post' action='php/imgremove.php'>
<input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
<button class='removeavatar' type='submit'>Remover</button>
</form>
<?php }  ?>

<?php }   ?>
</td>


<td class='prodname' data-id='<?php echo $row["item"];?>'> 
<?php echo $row["item"];?>
<br>

<?php if ($admin == 1) { ?>
<button class='deleteup' id='deleteup' data-id='<?php echo $row["id"]; ?>'>APAGAR</button>
<?php } ?>
</td>


<td>
<?php echo $row["price"] . ' €';?>
</td>
<?php

if ($row["stock"] == '1') {
echo 
"<td class='verde lastchild'>Em stock.!</td>";
} elseif ($row["stock"] == '2') {
echo 
"<td class='amarelo lastchild'>Pouco stock.</td>";
} else {
echo 
"<td class='vermelho lastchild'>Fora de stock.</td>";
}
?>




</tr>
<?php 
} 
?>
</table>
<div class='nav' id='nav'></div>
</div>
<!-- end forload-->
</div>
</div>

<div class='footer' id="footer">
<div class='footerinsert' id='footerinset'>
<table class='foottable' id='foottable'>
<tr>
<th>Name</th>
<td>
<?php echo  $name; ?>
</td>
</tr>

<tr>
<th>Email</th>
<td>
<?php echo  $email; ?>
</td>
</tr>

<tr>
<th>Utilizador</th>
<td>
<?php echo  $username; ?>
</td>
</tr>

<tr>
<th>TEMP(nome avatar)</th>
<td><?php echo  $avatar; ?></td>
</tr>

<tr>
<th>AVATAR</th>
<td>
<?php
if ($avatar == null){?>
<form action="php/avatarup.php" method="post" enctype="multipart/form-data">

<input class='inputfile' id='file' type="file" name="file">
<label for="file">(imagem para clique) Avatar.</label><br><br>
<button class='upload' type="submit" name="upload">Upload</button>
</form>
</td>
<?php ;}else{
?>
<div style="background-color:black;"><img style="max-height:200px;" src="img/avatar<?php echo $avatar; ?>"></div>
<?php
}?>

<?php if ($avatar != null){?>
<form method='post' action='php/avatarRemove.php'>
<button class='removeavatar' type='submit'>Remover</button>
</form>
<?php ;} ?>
</td>
</tr>





<?php
if ($username == null) {

} else { ?>
<form action="php/logout.php" method="post">
<button type="submit" id="logout" name="logout" value="Logout">Sair
</button>
</form>
<?php
} ?>
</td>
</table>
</div>
</div>

<div id="bottomfiller"></div>

<div id='carrinho'>

<?php 
$sql1 = "SELECT * FROM carrinho WHERE username = '$username'";
$stmt1 = $con->query($sql1);
$rowcount = $stmt1->num_rows;
if ($rowcount == null){
echo "<p class='vazio'>carrinho vazio!<p>";
}
else {
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
<td><button class='delete' data-id='<?php echo $row["id"]; ?>'>Retirar</button></td>

</tr>


<?php
}
}
?>
<button id='finalencomenda'>Finalizar encomenda.</button>
<button id='deletecarrinho'>DELETE</button>

</table>
<?php } ?>

</div>



<div id='produtonocarro'>já existe no carrinho!</div>
<div id='produtoaddcarro'>Produto adicionado <br> ao carrinho!</div>

<div id='itempage'>


</div>





<div style='display:none;' id='carrinhoemail'>
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


<ol>

<li>
<img style="max-width:50px;" src="img/img<?php echo $row['img']; ?>"><br>
<?php echo $row["produto"]; ?><br>
<?php echo $row["price"] . " € p/uni." ; ?><br>
quantidade: <?php echo $row["quantidade"]; ?>
</li>
<li id='grandtotal<?php echo $row["id_prod"];?>'><?php echo $row["price_final"] . " €" ; ?></li>

</ol>

<?php
}
}

$sql1 = "SELECT * FROM carrinho WHERE username = '$username'";
$stmt1 = $con->query($sql1);
$rowcount = $stmt1->num_rows;
if($username != null){
if($rowcount != null){
$stmt = $con->prepare("SELECT SUM(quantidade) as prodtotal, SUM(price_final) as pricetotal FROM carrinho WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()){ 
$sum = $row['prodtotal'];
$sum1 = $row['pricetotal'];
?>  
<td class='prodtotal'>
<?php echo '<br>'.'Items:'. $sum .'<br>'. 'Total:'.$sum1 . '€'.'<br>';} ?>
<?php } } ?>
<br>
</div>

<div class='listdropped' id='listdropped'>
    
<ol>
    <li><h1>LOS CALMOS</h1></li>
    <li>
        hello world
    </li>
    <li>
        hello world
    </li>
    <li>
        hello world
    </li>
    <li>
        hello world
    </li>
    <li>
        hello world
    </li>
    <li>
        hello world
    </li>
</ol>
</div>

<div id='backcurtain' class='backcurtain'></div>
<div id='infofooter' class='infofooter'>

</div>
</body>

</html>


<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->
<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->

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

<script>
$(document).ready(function(){
$('.detalhes,.olitem').click(function(){
var prodname = $(this).data('id');
var mapa = $(this).data('id2');

$.ajax({
type: "POST",
url: "php/itempage.php",
data: {prodname:prodname , mapa:mapa}, // get all form field value in serialize form
success: function(data) {
$('#itempage').animate().fadeIn(0);
$('#backcurtain').animate().fadeIn(0);
$('#itempage').html(data);
}
});
}); 
$('html').click(function() {
$('#itempage').animate().fadeOut(0);
$('#backcurtain').animate().fadeOut(0);
$("#utube").attr("src",'https://www.youtube-nocookie.com/embed/lQoQS48GUrk');
});

$('#itempage').click(function(event){

event.stopPropagation();
});

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

$.ajax({
type: "POST",
url: "php/mail.php",
data: {name:name, email:email, body:body}, // get all form field value in serialize form
success: function(data) {
$('#carrinhotable').closest('table').fadeOut(200,function(){
$(this).remove();
$("#carrinho").load("php/carrinho.php");
$(".car").load("php/prodtotal.php");
});
}
});
});
}
});
});

});
</script>


<script>
$(document).on('click','.deleteup',function (e) {

// Delete 
var el = this;

// Delete id
var deleteid = $(this).data('id');

var confirmalert = confirm("Are you sure?");
if (confirmalert == true) {
// AJAX Request
$.ajax({
url: 'php/deleteup.php',
type: 'POST',
data: { id:deleteid },
success: function(response){
if(response == 1){
// Remove row from HTML Table

$(el).closest('tr').fadeOut(200,function(){
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
</script>

<script>
$(document).on('click','.delete',function (e) {

// Delete 
var el = this;

// Delete id
var deleteid = $(this).data('id');

var confirmalert = confirm("Are you sure?");
if (confirmalert == true) {
// AJAX Request
$.ajax({
url: 'php/carrinhoapagar.php',
type: 'POST',
data: { id:deleteid },
success: function(response){
if(response == 1){
$('.car').load('php/prodtotal.php');
// Remove row from HTML Table

$(el).closest('tr').fadeOut(200,function(){
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
</script>

<script>

$(document).ready(function() {
$('#mainlogin').text("<?php if ($username != ''){echo 'Sr./Sra.'. $name;}else{echo 'Login';}?>");
});
</script>



<script>
$(document).ready(function() {

if ($("#mainlogin").val() != 0 && $("#mainlogin").text() != 'Login' ){

$('#mainlogin').val(0);
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').addClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#editordiv').show();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#fixeddiv').show();
$('#swap').show();
$('#swap1').show();
$('#carrinho').hide();
$('#editordiv').show();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#fixeddiv').show();
$('#swap').show();
$('#swap1').show();
$('#carrinho').hide();
}
else
{
$('#mainlogin').val(0);
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').addClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#editordiv').show();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#fixeddiv').show();
$('#swap').show();
$('#swap1').show();
$('#carrinho').hide(); 
}
});
</script>

<script>
$(document).ready(function() {
$('#mainlogin').click(function(){
$('#mainlogin').val(1);
$('#mainlogin').addClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#infofooter').hide();
$('#swap1').hide();
$('#swap').hide();
$('#searchdiv').hide();
$('#logindiv').show();
$('#editordiv').hide();
$('#emaildiv').hide();
$(".forload").hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#carrinho').hide();
});
});
</script>

<script>
$(document).ready(function() {
$('#mainregisto').click(function(){
$('#mainlogin').val(0);
$('#mainlogin').removeProp('checked');
$('#mainlogin').removeClass('selected');
$('#mainregisto').addClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').removeClass('footeractive');
$('#swap1').hide();
$('#swap').hide();
$('#infofooter').hide();
$('#fixeddiv').hide();
$('#editordiv').hide();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$(".forload").hide();
$('#fixedupdate').hide();
$('#registodiv').show();
$('#foottable').hide();
$('#carrinho').hide();
});

});
</script>

<script>
$(document).ready(function() {
$('#maineditor').click(function(){

if ($("#mainlogin").val() != 0 && $("#mainlogin").text() != 'Login' ){

$('#mainlogin').val(0);
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').addClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').removeClass('footeractive');
$('#editordiv').show();
$(".forload").show();
$('#infofooter').show();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#fixeddiv').show();
$('#swap').show();
$('#swap1').show();
$('#foottable').hide();
$('#carrinho').hide();
$('#editordiv').show();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#fixeddiv').show();
$('#swap').show();
$('#swap1').show();
$('#foottable').hide();
$('#carrinho').hide();
}
else
{
$('#mainlogin').val(0);
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').addClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').removeClass('footeractive');
$('#editordiv').show();
$(".forload").hide();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#infofooter').show();
$(".forload").show();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#fixeddiv').show();
$('#swap').show();
$('#swap1').show();
$('#foottable').hide();
$('#carrinho').hide(); 
}
});
});
</script>

<script>
$(document).ready(function() {

$('#mainupdate').click(function(){
if ($("#mainlogin").val() != 0 && $("#mainlogin").text() != 'Login' ){

$('#mainlogin').val(0);
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').addClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').removeClass('footeractive');
$('#editordiv').hide();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$(".forload").hide();
$('#fixedupdate').hide();
$('#infofooter').hide();
$('#registodiv').hide();
$('#fixeddiv').hide();
$('#swap').hide();
$('#swap1').hide();
$('#foottable').hide();
$('#carrinho').show();

}
else
{

$('#mainlogin').val(0);
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').addClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').removeClass('footeractive');
$('#carrinho').show();
$('#editordiv').hide();
$('#infofooter').hide();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$(".forload").hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#fixeddiv').hide();
$('#swap').hide();
$('#swap1').hide();
$('#foottable').hide();

}

});
});
</script>


<script>
$(document).ready(function(){
$('#filterpriceasc').click(function(){
var name = $('#byname').val();

$.ajax({
type: "POST",
url: "php/showbypriceasc.php",
data: {search:name}, // get all form field value in serialize form
success: function(data) {
$(".forload").html(data);
$('#filterpriceasc').addClass('selectedfilter');
$('#filterpricedesc').removeClass('selectedfilter');
}
});
});
});   
</script>
<script>
$(document).ready(function(){
$('#filterpricedesc').click(function(){
var name = $('#byname').val();

$.ajax({
type: "POST",
url: "php/showbypricedesc.php",
data: {search:name}, // get all form field value in serialize form
success: function(data) {
$(".forload").html(data);
$('#filterpriceasc').removeClass('selectedfilter');
$('#filterpricedesc').addClass('selectedfilter');
}
});
});
});   
</script>


<script>
$(document).ready(function() {
var rowsShown = 10;
var rowsTotal = $('.insertable1 tr').length;
var numPages = rowsTotal / rowsShown;
for (i = 0; i < numPages; i++) {
var pageNum = i + 1;
$('#nav').append('<a href="#" page="' + i + '">' + pageNum + '</a> ');
}
$('.insertable1 tr').hide();
$('.insertable1 tr').slice(0, rowsShown).show();
$('#nav a:first').addClass('active');

$('#nav a').bind('click', function() {
$('#nav a').removeClass('active');
$(this).addClass('active');
var currPage = $(this).attr('page');
var startItem = currPage * rowsShown;
var endItem = startItem + rowsShown;
$('.insertable1 tr').hide().slice(startItem, endItem)
.css('display', 'table-row').animate({
opacity: 1
}, 300);
});
});
</script>