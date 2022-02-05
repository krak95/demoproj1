<?php
require_once('php/config.php');
session_start();
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
  <div>

    <div id="mysidebar" trigger="0" class="sidebar">
      <a href="index.php"><img id="hide" src="img/tuga.png" class="sidebarimglosc">
        <h2>LosCalmos</h2>
      </a>
      <a href="update.php">
            <h3>Update</h3>
        </a>


      <a href="login.php">
        <h3>Login</h3>
      </a>
      <a href="Search.php">
        <h3 class="omg">Search</h3>
      </a>
      <a id="selected" href="registration.php">
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

    <div id="move" class="hide"></div>


    <!--moving sidebar-->
    <!-- EMAIL FORM-->

    <div class="container2">

      <div>
        <form action="registration.php" method="POST">
          <div class="div_reg">
            <h1>Registration</h1>
            <div>
              <input type="text" name="name" class="textbox" id="renam" placeholder="Name">
            </div>
            <div>
              <input type="text" name="username" class="textbox" id="reguser" placeholder="Username">
            </div>
            <div>
              <input type="password" name="password" class="textbox" id="regpass" placeholder="Password">
            </div>
            <div>
              <input type="text" name="email" class="textbox" id="regmail" placeholder="Email">
            </div>
            <input type="submit" name="create" id="regsubmit" value="Registrar">
          </div>
      </div>
      </form>
      <?php
      if (isset($_POST['create'])) {
        $name    = $_POST['name'];
        $username  = $_POST['username'];
        $password  = $_POST['password'];
        $email    = $_POST['email'];
        $sql = "INSERT INTO users (name, username, password, email) VALUES(?,?,?,?)";

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmtinsert = $con->prepare($sql);
        $stmtinsert->bind_param('ssss', $name, $username, $hash, $email);

        $result = $stmtinsert->execute();
        if ($result) {
          echo 'success';
        } else {
          echo 'fodeu geral';
        }
      }
      echo "<br>";
      $sql1 = mysqli_query($con, "SELECT * FROM users");
      echo '<div class="nutil"> Número de utilizadors: '. mysqli_num_rows($sql1);'</div>';

      ?>

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


    <!-- EMAIL FORM-->
  </div>
</body>

</html>