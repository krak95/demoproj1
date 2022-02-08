<?php

session_start();
require_once 'php/config.php';
include 'php/avatarcheck.php';
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>


<script>

$(document).ready(function() {
$('#mainlogin').text("<?php if ($username != ''){echo $name;}else{echo 'Login';}?>");
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
$('#footer').animate({height:'136px'},{duration:300,complete: function() {
$('#swap1').hide();
$('#swap').hide();
$('#searctablediv').hide();
$('#logindiv').show();
$('#editordiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();

}
});
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
$('.fecharlogin').hide();
$('#footer').animate({height:'136px'},{duration:300,complete: function() {
$('#swap1').hide();
$('#swap').hide();
$('#fixeddiv').hide();
$('#editordiv').hide();
$('#searctablediv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').show();
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
$('#footer').animate({height:'136px'},{duration:300,complete: function() {
$('#editordiv').show();
$('#searctablediv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('.fecharlogin').hide();
$('#fixeddiv').show();
$('#swap').show();
$('#swap1').show();
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
$('.fecharlogin').hide();
$('#footer').animate({height:'136px'},{duration:300,complete: function() {
$('#fixeddiv').hide();
$('#editordiv').hide();
$('#searctablediv').show();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#swap1').hide();
$('#swap').hide();
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
$('.fecharlogin').hide();
$('#footer').animate({height:'136px'},{duration:300,complete: function() {
$('#swap1').hide();
$('#swap').hide();
$('#fixeddiv').hide();
$('#editordiv').hide();
$('#searctablediv').hide();
$('#logindiv').hide();
$('#emaildiv').hide();
$('#fixedupdate').hide();
$('#registodiv').hide();
$('#swap1').hide();
$('#swap').hide();
}
});
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
$('.fecharlogin').hide();
$('#footer').animate({height:'136px'},{duration:300,complete: function() {
$('#swap1').hide();
$('#swap').hide();
$('#searctablediv').hide();
$('#logindiv').hide();
$('#editordiv').hide();
$('#emaildiv').show();
$('#fixedupdate').hide();
$('#registodiv').hide();

}
});
});
});
</script>



</head>


<body>
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
<button id='mainregisto'>Registo</button>
<button id='maineditor'>Editor</button>
<button id='mainsearch'>Procura</button>
<button id='mainupdate'>Update</button>
<button id='mainemail'>Email</button>
</tr>
</table>
</div>

<div id="emaildiv">
<!--- emaildiv--->
<div class="container3">

<form action="php/mail.php" method="post">
<div class="div_contato">

<h1 style="color:ghostwhite; text-align:center">Contato</h1>
<input type="text" id="contuser" name="name" value="<?php echo " $name"; ?>">
<input type="text" id="contemail" name="email" value="<?php echo " $email"; ?>">
<p id="subject">Subject</p>
<input type="text" id="contsub" name="subject">
<p id="mensagem">Mensagem</p>
<textarea placeholder="Mensagem" name="body" id="contmens" rows="3"></textarea>
<input id="sentmess" type="submit" />
</form>
</div>



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
window.location.href = 'empty.php';
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
<input type="text" name="name" class="textbox" id="renam" placeholder="Name">
<label for='renamempty' id='renamempty'>Preencha o campo, por favor!</label><br>

<h1>Utilizador:</h1><br>
<input type="text" name="username" class="textbox" id="reguser" placeholder="Username">
<label for='userexist' id='userexist'>Utilizador já existe!</label>
<label for='reguserempty' id='reguserempty'>Preencha o campo, por favor!</label><br>

<h1>Password:</h1><br>
<input type="password" name="password" class="textbox" id="regpass" placeholder="Password">
<label for='regpassempty' id='regpassempty'>Preencha o campo, por favor!</label><br>

<h1>Email:</h1><br>
<input type="text" name="email" class="textbox" id="regmail" placeholder="Email">
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
window.location.href = 'empty.php';
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
<button type='submit'>Login</button>
</div>
</form>
</div>

";
} else {
?>

<script>
$(document).ready(function() {
$('#mainlogin').click(function() {
$('#footer').animate({height:'80%'},{duration:400,complete: function() {
$('.fecharlogin').show();
$('#mainlogin').text('<?php echo $name ?>');
}
});
});
return false;
});
</script>

<script>
$(document).ready(function() {
$('.fecharlogin').click(function() {
$('.fecharlogin').hide(0, function(){
$('#footer').animate({height: '136px'}, 600);
});
});
return false;
});
</script>


<?php
};
?>
</div>


</div>


<!-- editordiv-->
<button type='button' id='swap'>&larr;<br>&rarr;</button>
<button type='button' id='swap1'>&larr;<br>&rarr;</button>
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

<table id="fixedinsert">

<form action="javascript:void(0)" method="POST" id="insert">
<script>
$(document).ready(function($) {
$('#insert').submit(function(e) {
if ($('#iproduto').val().length === 0 || $('#iquantidade').val().length === 0 || $('#iprice').val().length === 0) {
$("#preenchatxt").show();
$('#preenchatxt').fadeOut(900);
return false;

} else {
$("#insertTxt").fadeIn(function(){
$('#insertTxt').delay(150).fadeOut(600);

$.ajax({
type: "POST",
url: "php/insert.php",
data: $("#insert").serialize(), // get all form field value in serialize form
success: function() {
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
</script>

<div id='insertform'>
<label id='labelproduto'>Produto:</label>
<input autocomplete="off" type="text" name="produto" id="iproduto" class="textinput">

<label id='labelquantidade'>Quantidade:</label>
<input autocomplete="off" type="text" name="quantidade" id="iquantidade" class="textinput" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>

<label id='labelprice'>Preço:</label>
<input autocomplete="off" type="text" name="price" id="iprice" class="textinput" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>

<button type="submit" id='but-add' value="Adicionar">Adicionar</button>


<select id='istock' name="stock">
<option value="1">Em stock.</option>
<option value="2">Pouco stock.</option>
<option value="3">Fora de stock.</option>
</select>
</form>

<form method='post' action='php/deleteall.php'>
<button  type="submit" id='but-del' value="deleteall">Apagar tudo</button>
</form>

<div id="insertTxt">Adicionado com sucesso!</div>
<div id="preenchatxt">Preencha os campos!</div>
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
</div>
<div id='insertheader'>
<table>
<tr>
<th>Ref.</th>
<th>Produto</th>
<th>Quantidade</th>
<th>Preço</th>
<th>Stock</th>
</tr>
</table>
</div>
<div class="forload">
<table id="insertable1">


<?php $sql = "SELECT * FROM teste";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {


?>
<tr>

<td class="tdref">
<?php echo $row["id"]; ?>
</td>

<td class="tdprod">
<?php echo $row["produto"]; ?>
</td>

<td class="tdsql">
<?php echo $row["quantidade"]; ?>
</td>

<td class="tdsql">
<?php echo $row["price"] . " €";   ?>
</td>

<?php
if ($row["stock"] == '1') {
echo "<td class='verde'></td>";
} elseif ($row["stock"] == '2') {
echo "<td class='amarelo'></td>";
} else {
echo "<td class='vermelho'></td>";
}
}
?>
</tr>

<tr><th id='bordernone'><div id='lastdiv'></div></th></tr>

</table>
</div>
</div>

<div id='fixedupdate'>

<table id="updatetable">
<form action="javascript:void(0)" method="POST" id="update1">
<script>
$(document).ready(function($) {
$('#update1').submit(function(e) {
if ($('#uref').val().length === 0 || $('#uproduto').val().length === 0 || $('#uquantidade').val().length === 0 || $('#uprice').val().length === 0) {
$("#preenchatxt").show();
$('#preenchatxt').delay(700, 'linear').fadeOut(555);
} else {
$.ajax({
type: "POST",
url: "php/update.php",
data: $("#update1").serialize(), // get all form field value in serialize form
success: function() {
$(".forload").load("php/show.php");

}
});
}
});
return false;
});
</script><!-- UPDATE -->

<label id='labeluref'>Referência:</label>
<input autocomplete="off" type="text" name="id" id="uref" >

<label id='labeluprod'>Produto:</label>
<input autocomplete="off" type="text" name="produto" id="uproduto" >

<label id='labeluquant'>Quantidade:</label>
<input autocomplete="off" type="text" name="quantidade" id="uquantidade"  onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>

<label id='labeluprice'>Preço:</label>
<input autocomplete="off" type="text" name="price" id="uprice"  onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>

<select id='ustock' name="stock">
<option value="1">Em stock.</option>
<option value="2">Pouco stock.</option>
<option value="3">Fora de stock.</option>
</select>

<button type="submit" id="but-mod" value="Modificar">Modificar</button></td>

</form>

</table>
</div>


<div id="searctablediv">
<form action="javascript:void(0)" method="POST" id="search1">
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
<div id='searchtableheader'>
<table>

<tr>
<td colspan='2'>
<h5>Produto</h5>
</td>
<td colspan='3' id="searchinput"><input type="text" name="search" placeholder="Escreva aqui para procurar."></td>
</tr>
<tr>
<th>
<h5>Referência</h5>
</th>
<th>
<h5>Nome</h5>
</th>
<th>
<h5>Quantidade</h5>
</th>
<th>
<h5>Preço</h5>
</th>
<th>
<h5>Stock</h5>
</th>
</tr>
</table>
<table id="showsearchtable">
</table>
</div>
</form>

</div>
<div id="footer">
<div id='footerinset'>
<table id='foottable'>
<tr>
<th>Name</th>
<th>Email</th>
<th>Utilizador</th>
<th>Admin</th>
<th>??</th>
</tr>
<tr>
<td>
<?php echo  $name; ?>
</td>

<td>
<p><?php echo  $avatar; ?></p>

</td>

<td>
<?php echo  $username; ?>
</td>

<td>
<?php echo  $admin; ?>
</td>

<td>
<?php if ($avatar != null){?>
<form method='post' action='php/avatarRemove.php'>
<button id='removeavatar' type='submit'>Remover</button>
</form>
<?php ;} ?>
<?php
if ($avatar == null){?>
<form id='uploadimg' action="php/avatarup.php" method="post" enctype="multipart/form-data">
Select Image File to Upload:
<input type="file" name="file">
<button type="submit" name="upload" >Upload</button>
</form>
</td>
<?php ;}else{
?> 
<div style="background-color:black;"><img style="max-height:200px;" src="img/avatar<?php echo $avatar; ?>"></div>
<?php
}?>



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




</body>

</html>