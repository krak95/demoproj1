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

<link rel="stylesheet" href="css/mystyle.css">
<link rel="stylesheet" href="css/mobilecss.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script>
$(document).on('click','.deleteup',function (e) {

// Delete 
var bn = this;

// Delete id
var deleteup = $(this).data('id');

var confirmdel = confirm("Are you sure?");
if (confirmdel == true) {
// AJAX Request
$.ajax({
url: 'php/deleteup.php',
type: 'POST',
data: { id:deleteup },
success: function(response){
if(response == 1){
// Remove row from HTML Table
$(bn).closest('tr').css('background','tomato');
$(bn).closest('tr').fadeOut(800,function(){
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
url: 'php/CARRINHOapagar.php',
type: 'POST',
data: { id:deleteid },
success: function(response){
if(response == 1){
$('.car').load('php/prodtotal.php');
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
</script>

<script>

$(document).ready(function() {
$('#mainlogin').text("<?php if ($username != ''){echo 'Sr./Sra.'. $name;}else{echo 'Login';}?>");
});
</script>

<script>

$(document).ready(function() {
$('#swap1').hide();
$('#swap').hide();

});
</script>


<script>
$(document).ready(function() {
$('#mainlogin').click(function(){
$('#mainlogin').addClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#swap1').hide();
$('#swap').hide();
$('#searchdiv').hide();
$('#logindiv').show();
$('#editordiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#carrinho').hide();
});
});
</script>

<script>
$(document).ready(function() {
$('#mainregisto').click(function(){
$('#mainlogin').removeClass('selected');
$('#mainregisto').addClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').animate({width: '100px'},{duration:100,complete: function(){
$('#footer').animate({height: '56px'},{duration:100, complete: function(){
$('.fecharlogin').hide();
$('#swap1').hide();
$('#swap').hide();
$('#fixeddiv').hide();
$('#editordiv').hide();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').show();
$('#foottable').hide();
$('#carrinho').hide();
}
});
}
});
});

});
</script>

<script>
$(document).ready(function() {
$('#maineditor').click(function(){
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').addClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').animate({width: '100px'},{duration:100,complete: function(){
$('#footer').animate({height: '56px'},{duration:100, complete: function(){
$('#editordiv').show();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('.fecharlogin').hide();
$('#fixeddiv').show();
$('#swap').show();
$('#swap1').show();
$('#foottable').hide();
$('.fecharlogin').hide();
$('#carrinho').hide();
}
});
}
});
});
});
</script>

<script>
$(document).ready(function() {
$('#mainsearch').click(function(){
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').addClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').animate({width: '100px'},{duration:100,complete: function(){
$('#footer').animate({height: '56px'},{duration:100, complete: function(){
$('#editordiv').hide();
$('#searchdiv').show();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('.fecharlogin').hide();
$('#fixeddiv').hide();
$('#swap').hide();
$('#swap1').hide();
$('#foottable').hide();
$('.fecharlogin').hide();
$('#carrinho').hide();
var a = 0;
}
});
}
});
});
});
</script>


<script>
$(document).ready(function() {
$('#mainupdate').click(function(){
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').addClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').animate({width: '100px'},{duration:100,complete: function(){
$('#footer').animate({height: '56px'},{duration:100, complete: function(){
$('#editordiv').hide();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('.fecharlogin').hide();
$('#fixeddiv').hide();
$('#swap').hide();
$('#swap1').hide();
$('#foottable').hide();
$('.fecharlogin').hide();
$('#carrinho').show();
}
});
}
});
});
});
</script>

<script>
$(document).on('click', '#mainupdate', function() {
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').addClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').animate({width: '100px'},{duration:100,complete: function(){
$('#footer').animate({height: '56px'},{duration:100, complete: function(){
$('#editordiv').hide();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('.fecharlogin').hide();
$('#fixeddiv').hide();
$('#swap').hide();
$('#swap1').hide();
$('#foottable').hide();
$('.fecharlogin').hide();
$('#carrinho').show();
}
});
}
});
});
</script>

<script>
$(document).ready(function() {
$('#mainemail').click(function(){
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').addClass('selected');
$('#footer').animate({width: '100px'},{duration:100,complete: function(){
$('#footer').animate({height: '56px'},{duration:100, complete: function(){
$('#editordiv').hide();
$('#searchdiv').hide();
$('#logindiv').hide();
$('#emaildiv').show();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('.fecharlogin').hide();
$('#fixeddiv').hide();
$('#swap').hide();
$('#swap1').hide();
$('#foottable').hide();
$('.fecharlogin').hide();
$('#carrinho').hide();
var a = 0;
}
});
}
});
});
});
</script>



</head>


<body>

<div id='produtonocarro'>já existe no carrinho!</div>
<div id='infinitepage'>

<!--
<div class="nutil"> Número de utilizadors:

$sql1 = mysqli_query($con, "SELECT * FROM users");
echo mysqli_num_rows($sql1);
</div>
-->


<div id="maindiv">
<table>
<tr>
<button id='mainlogin'>Login</button>
<button id='mainregisto'>Criar conta</button>
<button id='maineditor'>Loja</button>
<button id='mainsearch'>Procura</button>
<button id='mainemail'>Email></button>
</tr>
</table>
</div>


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
<h2>Login</h2>
<h1>Utilizador:</h1><br>
<input type='text' name='username' class='textbox' id='username' placeholder='Utilizador'>
<label for='idvazio' id='idvazio'>Preencha o campo, por favor!</label><br>
<h1>Password:</h1><br>
<input type='password' name='password' class='textbox' id='password' placeholder='Password'>
<label for='wrongcred' id='wrongcred'>Credenciais erradas!</label>
<label for='passvazio' id='passvazio'>Preencha o campo, por favor!</label><br>
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
$('#foottable').hide();
$('#mainlogin').click(function() {
$('#mainlogin').addClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#footer').animate({height:'80%'},{duration:400,complete: function() {
$('#footer').animate({width:'100%'},{duration:400,complete: function() {
$('.fecharlogin').show();
$('#foottable').show();
$('#mainlogin').text('<?php echo $name; ?>');
}
});
}
});
});
return false;
});
</script>

<script>
$(document).ready(function() {
$('#foottable').hide();
$('.fecharlogin').click(function() {
$('.fecharlogin').hide(0, function(){
$('#footer').animate({width: '100px'},{duration:400,complete: function(){
$('#footer').animate({height: '56px'},{duration:600, complete: function(){
$('#foottable').hide();
var a = 0;
}

});
}
});

});
});
return false;
});
</script>


<?php
}
?>
</div>


</div>


<!-- editordiv-->
<div id="editordiv">



<div id="fixeddiv">


<script>

$(document).ready(function() {
$('#fixedupdate').hide();
$('#swap').click(function(){
$('#fixeddiv').show();
$('#fixedupdate').hide();
$('#swap').hide();
$('#swap1').show();
});

});

</script>
<script>
$(document).ready(function() {
$('#swap1').click(function(){
$('#fixeddiv').hide();
$('#fixedupdate').show();
$('#swap').show();
$('#swap1').hide();

});
});
</script>

<?php 
if ( $admin == 1){ ?>


<table id="fixedinsert">
<script>
$(document).ready(function($) {
$('#but-add').click(function(e) {
var iprod = $('.iprod').val();
var iquant = $('.iquant').val();
var iprice = $('.iprice').val();
var istock = $('.istock').val();
if ($('#iproduto').val().length === 0 || $('#iquantidade').val().length === 0 || $('#iprice').val().length === 0) {

$("#preenchatxt").show();
$('#preenchatxt').fadeOut(900);
return false;

}
if ($('#iref').val().length !== 0) {

$("#referror").show();
$('#referror').fadeOut(900);
}

$.post('php/checkprod.php', { prod: $('#iproduto').val()}, function(response) {
if (response != 'go') {
$("#existingprod").show();
$('#existingprod').fadeOut(900);
}else{
$("#insertTxt").fadeIn(function(){
$('#insertTxt').fadeOut(700);

$.ajax({
type: "POST",
url: "php/insert.php",
data: {keyprod:iprod, keyquant:iquant, keyprice:iprice, keystock:istock}, // get all form field value in serialize form
success: function(data) {
$(".forload").load("php/show.php");
$("html, body").animate({
scrollTop: $(document).height() - $(window).height()
});
}
});
});
}
});
return false;
});
});
</script>

<div id='insertform'>

<label id='labelref'>Referência:</label>
<input autocomplete="off" type="text" name="ref" id="iref" class="textinput">

<label id='labelproduto'>Produto:</label>
<input autocomplete="off" type="text" name="produto" id="iproduto" class="iprod">

<label id='labelquantidade'>Quantidade:</label>
<input autocomplete="off" type="text" name="quantidade" id="iquantidade" class="iquant" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>

<label id='labelprice'>Preço:</label>
<input autocomplete="off" type="text" name="price" id="iprice" class="iprice" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>

<button type="submit" id='but-add' value="Adicionar">Adicionar</button>


<select id='istock' class="istock" name="stock">
<option value="1">Em stock.</option>
<option value="2">Pouco stock.</option>
<option value="3">Fora de stock.</option>
</select>

<?php /*DELETE BUTTON*/
if ($admin == 1){
echo "
<form method='post' action='php/deleteall.php'>
<button  type='submit' id='but-del' value='deleteall'>Apagar tudo</button>
</form>";
}
?>

<div id="insertTxt">Adicionado com sucesso!</div>
<div id="preenchatxt">Preencha os campos!</div>
<div id="existingprod">Produto já existe na base de dados!</div>
<div id='referror'>Por favor, apague o campo referência! Este campo será automaticamente preenchido.</div>
</div>

<form action="javascript:void(0)" method="POST" id="deleteref">
<script>
$(document).ready(function($) {
$('#deleteref').submit(function(e) {


$.ajax({
type: "POST",
url: "php/deleteref.php",
data: $("#deleteref").serialize(),
success: function() {
$("#insertable1").load("php/show.php");
$("#insertTxt").show();
$('#insertTxt').delay(700, 'linear').fadeOut(555);

}
});
});
return false;
});
</script>

<!--
<tr>
<td>
<input id='refdel' name="id" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
</td>
<td>
<input class='refresher' value="Eliminar" type="submit">
</td>

<td>
<form method="post" action="php/deletetruncate.php">
<input class='refresher' type="submit" value="deltruncate">
</form>
</td>
</td>
</tr>
-->

</form>
</table>

<?php } ?>
</div>
<div class="forload">

<table id="insertable1">

<script>

$(document).ready(function() {
$('.addcart').click(function() {
var addcart = $(this).data('id');
$.post('php/CARRINHOcheckprod.php', {
produto: addcart
}, function(response) {
if (response == "stop") {
$('#produtonocarro').show();
$('#produtonocarro').fadeOut(2000);
}else{

$.ajax({
type: "POST",
url: "php/addtocart.php",
data: {id:addcart}, // get all form field value in serialize form
success: function(data) {
$("#carrinho").load("php/CARRINHO.php");
$(".car").load("php/prodtotal.php");
}
});
}
});
});
return false;
});
</script>

<?php 

$sql = "SELECT * FROM produtos";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {


?>
<tr>

<td>
<?php if ($row['img'] == null){ ?>
<?php if ($admin == 1){ ?>
<form action="php/imgUPLOAD.php" method="post" enctype="multipart/form-data">
<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
<input class='inputfile1' id='file1' type="file" name="file">
<label for="file1">(imagem para clique) Avatar.</label><br><br>
<button class='upload' type="submit" name="upload">Upload</button>
</form>
</td>
<?php } }else{ ?>
<?php if ($admin == 1){ ?>


<form method='post' action='php/imgREMOVE.php'>
<input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
<button class='removeavatar' type='submit'>Remover</button>
</form>
<?php }  ?>
<div style="background-color:black;"><img style="max-width:50px;" src="img/img<?php echo $row['img']; ?>"></div>

<?php }   ?>
</td>


<td>
<?php
if($username != null){?>
<button class='addcart' data-id='<?php echo $row["produto"]; ?>'> addcart </button>
<?php
}else{
echo "<button class='loginshop'>login before shopping </button>";
} ?>
</td>
<script>
$(document).ready(function() {
$('.loginshop').click(function(){
$('#mainlogin').addClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').removeClass('selected');
$('#mainemail').removeClass('selected');
$('#swap1').hide();
$('#swap').hide();
$('#searchdiv').hide();
$('#logindiv').show();
$('#editordiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#carrinho').hide();
});
});
</script>


<td>
<p id='prodname' data-id='<?php echo $row["produto"];?>'><?php echo $row["produto"];?></p>
<br> REF: <?php
    echo $row['id']; ?>
    
<?php if ( $admin == 1) { ?>
<br><button class='deleteup' data-id='<?php echo $row["id"]; ?>'>APAGAR</button>
<?php } ?>
</td>

<td>
<?php echo $row["price"] . " €";   ?>
</td>

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
}
?>


</tr>
<?php 
} 
?>


<tr><th id='bordernone'><div id='lastdiv'></div></th></tr>

</table>
</div>
</div>


<div id="searchdiv">


<div id='searchtablediv'>

<script>
$(document).ready(function() {
$('#search1').on('keyup', function(event) {

$.ajax({
type: "POST",
url: "php/search.php",
data: $("#search1").serialize(), // get all form field value in serialize form
success: function(data) {
$("#showsearchtable").html(data);
}
});
});
});
</script>
<form action="javascript:void(0)" method="POST" id="search1">
<label>Produto:</label><br>
<input type="text" name="search" placeholder="Escreva aqui para procurar."><br>
</form>

<script>
$(document).ready(function() {
$('#searchref').on('keyup', function(event) {

$.ajax({
type: "POST",
url: "php/searchref.php",
data: $("#searchref").serialize(), // get all form field value in serialize form
success: function(data) {
$("#showsearchtable").html(data);
}
});
});
});
</script>
<form action="javascript:void(0)" method="POST" id="searchref">
<label>Referência:</label><br>
<input type="text" name="searchref" placeholder="Escreva aqui para procurar.">
</form><br>

<table id='searchtableheader'>

<tr>
<th>Ref.</th>
<th>Nome</th>
<th>Quantidade</th>
<th>Preço</th>
<th>Stock</th>
</tr>

</table>

<table id="showsearchtable"></table>

</div>
</div>

<div id="footer">
<div id='footerinset'>
<table id='foottable'>
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
<button class="fecharlogin">&darr;</button>
</table>
</div>
</div>


<div id="bottomfiller"></div>

<div id='carrinho'>
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

</table>
</div>

<div class="car">
<?php
$sql1 = "SELECT * FROM carrinho WHERE username = '$username'";
$stmt1 = $con->query($sql1);
$rowcount = $stmt1->num_rows;
if($username != null){
if($rowcount != null){
?>
<button id='mainupdate'><img src="img/cart.png" width="50px" height="50px" ></button>
<?php } } ?>
</div>

</body>

</html>


<!-- SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT SCRIPT  -->

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