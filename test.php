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
        if (response == 'false') {
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
}
$('#wrongcred').show();
    $('#wrongcred').fadeOut(2000);
});
}
});
}
});
return false;
});
</script>