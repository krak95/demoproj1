<?php
session_start();
require_once "php/config.php";
$username = $_SESSION['username'] ?? null;
$admin = $_SESSION['admin'] ?? null;
if($admin == 'admin'){
    echo "<div class='adminalert'><a href='table.php'><p>ADMIN ROOM</p></a></div>";
} 
?>
<!DOCTYPE html>
<html>

<head>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
</script>

    <link rel="stylesheet" href="css/mystyle.css">
    
    <meta charset="UTF-8">
</head>
<title>LosCalmos</title>

<body>

    <div>
        <div id="move" class="hide"></div>

        <script>
        $(document).ready(function(e) {
            $('#move').click(function() {
                if ($('#mysidebar').attr("trigger") === "0") {
                    $('#mysidebar').animate({
                        "left": "-224px"
                    }, 700);
                    $('#mysidebar').attr("trigger", "1");
                } else {
                    $('#mysidebar').animate({
                        "left": "0px"
                    }, 700);
                    $('#mysidebar').attr("trigger", "0");
                }
            });
        });
    </script>

            <div id="mysidebar" trigger="0" class="sidebar">
                <a href="index.php"><img id="hide" src="img/tuga.png" class="sidebarimglosc">
                    <h2>LosCalmos</h2>
                </a>
                <a href="update.php">
            <h3>Update</h3>
        </a>


                <a id="selected" href="login.php">
                    <h3>Login</h3>
                </a>
                <a href="Search.php">
                    <h3 class="omg">Search</h3>
                </a>
                <a href="registration.php">
                    <h3 class="omg">Registo</h3>
                </a>  <?php 
        if($username == null) {
        }else{?>
            <form method="post">
            <input type="submit" id="logout" name="logout" value="Logout">
            </input>

        </form>
    <?php ; } ?>

        <?php
        if (isset($_POST['logout'])) {
            header('location: php/logout.php');
            echo '<div class="errorlog">Logging out...</div>';
        }
   
        ?>
            </div>


        <div id="moveout" class="container1">
           

<?php
        if($username == ''){
    echo "
    <div class='div_login'>
    <form action='php/login.php' method='POST' id='formlog'>
    <script>
    
$(document).ready(function($){
$('#formlog').submit(function(e){
    if ($('#username').val().length === 0 || $('#password').val().length === 0) {
            $('#loginvazio').fadeIn(555);
            $('#loginvazio').delay(1000).fadeOut(555);
            return false;}else{
$.ajax({
type:'POST',
url: 'php/login.php',
data: $('#formlog').serialize(), // get all form field value in serialize form
success: function(){
    var url = 'contato.php';
$(location).attr('href',url);

}
});
}
});
return false;
});
</script>
        <h1>Login</h1>
        <input type='text' class='textbox' id='username' name='txt_uname' placeholder='Username' />

        <input type='password' class='textbox' id='password' name='txt_pwd' placeholder='Password' />

        <input type='submit' id='login' value='Login' />
    </form>
</div>

    
"
;
} else {
    echo "<div class='div_logged'>
    <h1>Já estás ligado.</h1>
</div>";
}
?>


<!-- ------------------------------------------------------------------------------------------------------------------------ -->

</div>
<div id="loginvazio" style="display:none;"><h1>Preencha os campos, por favor.</h1></div>


       
        <div class="waveAnimation">
            <div class="waveWrapperInner bgTop">
                <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
            </div>
            <div class="waveWrapperInner bgMiddle">
                <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
            </div>
            <div class="waveWrapperInner bgBottom">
                <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
            </div>
        </div>
</div>

</body>
</html>