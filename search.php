<?php
require_once "php/config.php";
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
    <div id="move" class="hide"></div>


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
        <a id="selected" href="Search.php">
            <h3 class="omg">Search</h3>
        </a>
        <a href="registration.php">
            <h3 class="omg">Registo</h3>
        </a>
        <?php
        if ($username == null) {
        } else { ?>
            <form method="post">
                <input type="submit" id="logout" name="logout" value="Logout">
                </input>

            </form>
        <?php ;
        } ?>

        <?php
        if (isset($_POST['logout'])) {
            header('location: php/logout.php');
            echo '<div class="errorlog">Logging out...</div>';
        }

        ?>
    </div>




    <!--moving sidebar-->
    <div class="searctablediv">
        <div>
            <table class="searchtable">
                <form action="" method="GET">
                    <td colspan='5'><input id="search" name="search" placeholder="search" value="">
                        <button id="searchb" type="submit" name="submit">Search</button>
                    </td>
                    <tr>
                    <td class="searchresults">
                            <h5>Referência </h5>
                        </td>
                        <td class="searchresults">
                            <h5>Nome </h5>
                        </td>
                        <td class="searchresults">
                            <h5>Quantidade </h5>
                        </td>
                        <td class="searchresults">
                            <h5>Preço </h5>
                        </td>
                        <td class="searchresults">
                            <h5>Preço Total </h5>
                        </td>

                    </tr>
                    

            </table>
                    
  </div>
                                <table id="showsearchtable">
                                <?php
                    if (isset($_GET['search'])) {
                        $sql = "SELECT id,produto,quantidade,price FROM teste WHERE produto LIKE '%".$_GET["search"]."%' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
                        while($row = mysqli_fetch_array($result))
                        {
                        $output .= '
                            <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['produto'].'</td>
                        <td>'.$row['quantidade'].'</td>
                        <td>'.$row['price'].'</td>
                        </tr>';
                       
                        echo $output;
                        }

    }
    else { echo 'data not found';}
}?>
</form>
</table>
<script>
        $(document).ready(function() {
            var rowsShown = 8;
            var rowsTotal = $('#showsearchtable tr').length;
            var numPages = rowsTotal / rowsShown;
            for (i = 0; i < numPages; i++) {
                var pageNum = i + 1;
                $('#nav1').append('<a href="#" page="' + i + '">' + pageNum + '</a> ');
            }
            $('#showsearchtable tr').hide();
            $('#showsearchtable tr').slice(0, rowsShown).show();
            $('#nav1 a:first').addClass('active');

            $('#nav1 a').bind('click', function() {
                $('#nav1 a').removeClass('active');
                $(this).addClass('active');
                var currPage = $(this).attr('page');
                var startItem = currPage * rowsShown;
                var endItem = startItem + rowsShown;
                $('#showsearchtable tr')
                    .css('opacity', '0.0').hide().slice(startItem, endItem)
                    .css('display', 'table-row').animate({opacity: 1 }, 300);

            });
        });
    </script>
<div id="nav1"></div>
             
      
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