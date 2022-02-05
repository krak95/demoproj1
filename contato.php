<?php
require_once ('php/config.php');
session_start();
$name = $_SESSION['name'] ?? null;
$email = $_SESSION['email'] ?? null;
$username = $_SESSION['username'] ?? null;
$admin = $_SESSION['admin'] ?? null;
if($admin == 'admin'){
  echo "<a href='table.php'><div class='adminalert'><p>ADMIN ROOM</p></div>";
} else {
}
  ?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">

<head>
  <title>BiblioTuga</title>
  <link rel="stylesheet" href="css/mystyle.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<script>
    $(document).ready(function(e){
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
<div id="mySidebar" trigger="0" class="sidebar">
        
        <a href="index.php"><img id="hide" src="img/tuga.png" class="sidebarimglosc">
            <h2>LosCalmos</h2>
        </a>

        <a href="">
            <h3>Empty</h3>
        </a>

        <a href="login.php">
            <h3>Login</h3>
        </a>

        <a href="Search.php">
            <h3 class="omg">Search</h3>
        </a>

        <a href="registration.php">
            <h3 class="omg">Registo</h3>
        </a>
        <?php 
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


      



  <!-- Contact Form -->
  <div class="container3">
    
    <form action="php/mail.php" method="post">
      <div class="div_contato">

        <h1 style="color:ghostwhite; text-align:center">Contato</h1>
        <input type="text" id="contuser" name="name"  value="<?php echo " $name"; ?>">
        <input type="text" id="contemail" name="email"  value="<?php echo " $email"; ?>">
        <p id="subject">Subject</p>
        <input type="text" id="contsub" name="subject">
        <p id="mensagem">Mensagem</p>
        <textarea placeholder="Mensagem" name="body" id="contmens" rows="3"></textarea>
        <input id="sentmess" type="submit"  />
        </form>
      </div>
  
  

  </div>

  <div class="waveAnimation">
    <div class="waveWrapperInner bgTop">
      <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')">
      </div>
    </div>
    <div class="waveWrapperInner bgMiddle">
      <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')">
      </div>
    </div>
    <div class="waveWrapperInner bgBottom">
      <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')">
      </div>
    </div>
  </div>

  <!-- End Contact Form -->

</body>

</html>