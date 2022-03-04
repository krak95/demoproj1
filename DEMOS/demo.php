<?php 
session_start();
?>
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
<input type="text" class='1'>
<input type="text" class='2'>
<button type="submit" class='submit'>submit</button>

<button type="submit" class='submit1'>submit1</button>
<div class='load'></div>

</body>
</html>

<script>
$('.submit').click(function() {
  var id11 = $('.1').val();
  var id22 = $('.2').val();
$.ajax({
type: "POST",
url: "demo1.php",
data: {id1:id11, id2:id22}, // get all form field value in serialize form
success: function(data) {
    $(".load").load('demoload.php');
}
});

});
</script>


<script>
$('.submit1').click(function() {
  var id11 = $('.1').val();
  var id22 = $('.2').val();
$.ajax({
type: "POST",
url: "demo1.php",
data: {id1:id11, id2:id22}, // get all form field value in serialize form
success: function(data) {
    $(".load").load('demoload1.php');
}
});

});
</script>


<script>
$('.submit').hover(function() {
  $('.submit').append("<div class='box'> suckmyduk <div>");
}, function(){
  $('.box').remove();
});
</script>