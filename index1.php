<?php
require_once "php/config.php";
session_start();
$username = $_SESSION['username'] ?? null;
$admin = $_SESSION['admin'] ?? null;
if($admin == 'admin'){
    echo "<div class='adminalert'><a href='table.php'><p>ADMIN ROOM</p></a></div>";
} 
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">

<head>
    <title>LosCalmos</title>
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>

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
    <div id="move"  class="hide"></div>


    <div id="mysidebar" trigger="0" class="sidebar">
        <a href="index.php" id="selected"><img id="hide" src="img/tuga.png" class="sidebarimglosc">
            <h2>LosCalmos</h2>
        </a>
        <a href="empty.php">
            <h3>js test</h3>
        </a>

        <a href="login.php">
            <h3>Login</h3>
        </a>
        <a  href="Search.php">
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
    <!--moving sidebar-->



    <div class="slideshow-container ">

        <!-- IMAGES -->
        <div class="mySlides fade">
            <img src="img/inf.png">
        </div>
        <div class="mySlides fade">
            <img src="img/mir.png">
        </div>
        <div class="mySlides fade">
            <img src="img/mir.png">
        </div>
        <div class="mySlides fade">
            <img src="img/mir.png">
        </div>
        <!-- IMAGES -->


        <!-- Next and previous buttons -->
        <div>
            <button class="prev" onclick="plusSlides(-1) ">&#10094;</button>
            <button class="next" onclick="plusSlides(1) ">&#10095;</button>
        </div>
        <!-- The dots/circles -->
        <div class="dots">
            <button class="dot" onclick="currentSlide(1) "></button>
            <button class="dot" onclick="currentSlide(2) "></button>
            <button class="dot" onclick="currentSlide(3) "></button>
            <button class="dot" onclick="currentSlide(4) "></button>
        </div>


    </div>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        /*frente e tr�s*/
        function plusSlides(n) {
            showSlides(slideIndex += n); /*showSlides executa --> slideIndex = slideIndex + n*/
        }

        /*pontos*/
        function currentSlide(n) {
            showSlides(slideIndex = n); /*showSlides executa --> slideIndex = n*/
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides "); /*liga vari�vel slides ao elemento mySlides*/
            var dots = document.getElementsByClassName("dot "); /*liga vari�vel dots ao elemento dot*/
            if (n > slides.length) {
                slideIndex = 1/*loop para frente, depois do �ltimo volta ao primeiro*/
            } 
            if (n < 1) {
                slideIndex = slides.length/*loop para tr�s,depois do primeiro volta ao �ltimo*/
            } 
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none ";
            } /*substitui imagem por imagem */
            slides[slideIndex - 1].style.display = "inline "; /*mostra a imagem*/
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace("active ", " ");
            } /*ativa ponto*/
            dots[slideIndex - 1].className += " active "; /*ativa ponto*/
        }
    </script>


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

</body>

</html>