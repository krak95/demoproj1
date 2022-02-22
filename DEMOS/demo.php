<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="css.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>




</head>
<body>
<div class='button' id='buttonSHOW'>

</div>

<div class='button' id='buttonHIDE'>

</div>
<div id='demo'>
<table >

<tr>
<th>
1one
</th>
<th>
1one
</th>
<th>
1one
</th>
</tr>

<tr>
<td>
1one
</td>

<td>
1one
</td>

<td>
1one
</td>
</tr>

</table>
</div>

<div id='bigduk'></div>
</body>
</html>

<script>
$(document).ready(function(){
    $('#bigduk').hide();
    var bigduk = $('#bigduk');
$('#buttonHIDE').click(function(){
$('#demo').hide();
$('#buttonHIDE').hide();
$('#buttonSHOW').show();
$('#buttonSHOW').text('SHOW');
});
});
</script>

<script>
$(document).ready(function(){
    var bigduk = $('#bigduk');
$('#buttonSHOW').click(function(){
$('#demo').show();
$('#buttonSHOW').hide();
$('#buttonHIDE').show();
$('#buttonHIDE').text('HIDE');
});
});
</script>