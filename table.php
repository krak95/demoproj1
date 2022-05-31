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
        <a href="registration.php">
            <h3 class="omg">Registo</h3>
        </a>
        <?php
        if (!$username == null){
            ?>
            <form method="post">
                <input type="submit" id="logout" name="logout" value="Logout">
            </form>
        <?php
        echo "";
        }
        ?>
<?php
        if (isset($_POST['logout'])){
            /* header('location:php/logout.php');
            echo "<div class='errorlog'>Logging out...</div>";*/
            $logout="php/logout.php";
            echo ("<script>location.href='$logout'</script>");
            echo "logged out";
        }?>
    </div>
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
    <!-- table -->
    <!-- table -->
    <div>
<script>
        $(document).ready(function(e) {
            $('#move1').click(function() {
                if ($('.movetable').attr("trigger") === "0") {
                    $('.movetable').css({"visibility":"visible"})
                    $('.insertable').css({"visibility":"hidden"})
                    $('.movetable').attr("trigger", "1");
                } else {
                    $('.movetable').css({"visibility":"hidden"})
                    $('.insertable').css({"visibility":"visible"})
                    $('.movetable').attr("trigger", "0");
                }
            });
        });
    </script>

    <script>
$(document).ready(function(e) {

        $('#move1').click(function(){
            if ($('#move1').attr("trigger") === "0") {
                $('#insertmove')
                .css({"display":"none"}).animate({opacity: 1}, 300);
                 $('#update')
                .css({"display":"inherit"}).animate({opacity: 1}, 300);
                    $('#move1').attr("trigger","1");
            }else{
                $('#insertmove')
                .css({"display":"inherit"}).animate({opacity: 1}, 300);
                $('#update')
                .css({"display":"none"}).animate({opacity: 1}, 300);
                    $('#move1').attr("trigger","0");
            }
                
        });
});
        </script>
<div id="move1" trigger="0"><a id="update">Update</a><a id="insertmove">Insert</a></div>
        
        <div class="remove" >
        <div id="preenchatxt"><h2>Preencha os campos!</h2></div>
           <div id="insertTxt"><h2>Adicionado!</h2></div>
                <table class="insertable" trigger="0">

                    <form action="javascript:void(0)" method="POST" id="insert">
<script>
$(document).ready(function($){
$('#insert').submit(function(e){
    if ($('#iproduto').val().length === 0 || $('#iquantidade').val().length === 0 || $('#iprice').val().length === 0) {
            $("#preenchatxt").show();
            $('#preenchatxt').delay(1000).fadeOut(555);
    }else{
$.ajax({
type:"POST",
url: "php/insert.php",
data: $("#insert").serialize(), // get all form field value in serialize form
success: function(){
    $("#insertable1").load("php/show.php");
    $("#insertTxt").show();
    $('#insertTxt').delay(1000).fadeOut(555);
}
});
}
});  
return false;
});
</script>
                        <tr>
                            <td >
<h5>Produto</h5><input autocomplete="off" type="text" name="produto" id="iproduto">
                            </td>
                            <td >
<h5>Quantidade</h5><input autocomplete="off" type="text" name="quantidade" id="iquantidade" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                            </td>
                            <td >
<h5>Preço</h5><input autocomplete="off" type="text" name="price" id="iprice"  onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                            </td>
                            <td>
<input type="submit" id="refresher" value="Adicionar"></input>
                        </td>
                       
                        </tr>
                        
                        

                    </form>
                    <!-- SHOW PHP -->
                    <form action="javascript:void(0)" method="POST" id="deleteref">
<script>
$(document).ready(function($){
$('#deleteref').submit(function(e){
$.ajax({
type:"POST",
url: "php/deleteref.php",
data: $("#deleteref").serialize(),
success: function(){
    $("#insertable1").load("php/show.php");
    $("#insertTxt").show();
    $('#insertTxt').delay(1000).fadeOut(555);
    return false;
    
}
});
});  
return false;
});
</script>
<tr>
<td colspan="4">
<input name="id" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' >
<input value="Eliminar" type="submit" id="refresher">
</td>
</tr>
                     </form>
                </table>
                
            <table id="insertable">

                <tr>
                    <td class="tdref"><h5>Referência</h5></td>
                    <td class="tdprod"><h5>Produto</h5></td>
                    <td class="tdsql"><h5>Quantidade</h5></td>
                    <td class="tdsql"><h5>Preço por unidade</h5></td>
                    <td class="tdsql"><h5>Total</h5></td>
                    <td class="tddelete"><h5>Delete</h5></td>
                </tr>
            </table>

            
            <table id="insertable1">
            <?php
        $sql =  "SELECT COUNT(*) FROM teste";
        $result = $con->query($sql);
        while($row = mysqli_fetch_array($result)) {
            ?>
            <tr><td colspan="6" class="tdentradas">
                <?php echo 'Número de entradas:'. $row['COUNT(*)']; } ?>
            </td></tr>

                <?php $sql = "SELECT * FROM teste";
                $result = $con->query($sql); 
                while ($row = $result->fetch_assoc()) 
                {
                    

                ?>
                
                            
                        <tr id="flashing">

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

                            <td class="tdsql">
                                <?php
                                $total = $row['quantidade'] * $row['price'];
                                echo $total . " €";
                                ?>
                            </td>

<form action="javascript:void(0)" method="POST" id="delete1">
<script>
$(document).ready(function($){
$('#delete1').submit(function(e){
    var data1 = '<?php $row["id"]; ?>';
$.ajax({
type:"POST",
url: "php/delete.php",
data: data1,
success: function(){
    $("#insertable1").load("php/show.php");
    $("#insertTxt").show();
    $('#insertTxt').delay(1000).fadeOut(555);
}
});
});  
return false;
});
</script>
 


                            <td class="tddelete">
            
                            <div><input class="deleteb" type="submit" id="<?php $row["id"]; ?>"></div>
                            </td>
                           
                    <?php 
                    }
                
                    ?>

                        </tr>
            </table>
            </form>

            
        
        <table class="updatetable movetable"  trigger="0">

        <form action="javascript:void(0)" method="POST" id="update1">
        <script>
$(document).ready(function($){
$('#update1').submit(function(e){
    if ($('#uref').val().length === 0 || $('#uproduto').val().length === 0 || $('#uquantidade').val().length === 0) {
            $("#preenchatxt").show();
            $('#preenchatxt').delay(1000).fadeOut(555);
    }else{
$.ajax({
type:"POST",
url: "php/update.php",
data: $("#update1").serialize(), // get all form field value in serialize form
success: function(){
    $("#insertable1").load("php/show.php");
    $("#insertTxt").show();
    $('#insertTxt').delay(1000).fadeOut(555);
}
});
}
});  
return false;
});
</script>
   
    <tr>
    <td style="position:relative">
            <h5>Referência</h5><input autocomplete="off" id="uref" type="text" name="id" class="decimal" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
        </td>
        <td style="position:relative">
            <h5>Produto</h5><input autocomplete="off" id="uproduto" type="text" name="produto" class="textbox">
        </td>
        <td style="position:relative">
            <h5>Quantidade</h5><input autocomplete="off" id="uquantidade" type="text" name="quantidade" class="decimal" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
        </td>
        <td style="position:relative">
            <h5>Preço</h5><input autocomplete="off" id="uprice" type="text" name="price" class="decimal" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
        </td>

        <td><input type="submit" value="Modificar" id="modificar" name="updateit"></td>
    </tr>
    </form>
    </table>
    </div>

<script>
        $(document).ready(function() {
            var rowsShown = 8;
            var rowsTotal = $('#updatetable1 tr').length;
            var numPages = rowsTotal / rowsShown;
            for (i = 0; i < numPages; i++) {
                var pageNum = i + 1;
            }
            $('#updatetable1 tr').hide();
            $('#updatetable1 tr').slice(0, rowsShown).show();
            $('#nav a:first').addClass('active');

            $('#nav a').bind('click', function() {
                $('#nav a').removeClass('active');
                $(this).addClass('active');
                var currPage = $(this).attr('page');
                var startItem = currPage * rowsShown;
                var endItem = startItem + rowsShown;
                $('#updatetable1 tr')
                    .css('opacity', '0.0').hide().slice(startItem, endItem)
                    .css('display', 'table-row').animate({
                        opacity: 1
                    }, 300);
            });
        });
    </script>
    
    </tr>
    </table>
    <!-- page end -->
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