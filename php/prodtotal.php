
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
if (a = 0){
$('#mainupdate').click(function(){
$('#mainlogin').removeClass('selected');
$('#mainregisto').removeClass('selected');
$('#maineditor').removeClass('selected');
$('#mainsearch').removeClass('selected');
$('#mainupdate').addClass('selected');
$('#mainemail').removeClass('selected');
});
} else {
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
var a = 0;
}
});
}
});
});
}
});
</script>

<?php
session_start();
require_once "config.php";
$username = $_SESSION['username'];
?>

<div class="car">
<?php
$sql1 = "SELECT * FROM carrinho WHERE username = '$username'";
$stmt1 = $con->query($sql1);
$rowcount = $stmt1->num_rows;
if($username != null){
  if($rowcount != null){
?>
<button id='mainupdate'><img src="../img/cart.png" width="50px" height="50px" ></button>
<?php } } ?>
</div>