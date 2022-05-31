<?php
session_start();
require_once "config.php";
$admin = $_SESSION['admin'] ?? null;
?>


<table class="insertable1">


<?php 

$filter = $_POST['searchref'] ?? null;
$sql = "SELECT * FROM produtos WHERE id LIKE '%$filter%' ";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {


  ?>
  <tr class='olitem' data-id='<?php echo $row["item"];?>'  id='<?php echo $row['item']; ?>'>
  
  <td class='firstchild' data-id='<?php echo $row['img']?>'><img src='img/img<?php echo $row['img']?>'> 
  
  <?php if ($admin == 1){?><br>
  REF: <?php
  echo $row['id']; }?>
  <?php if ($row['img'] == null){ ?>
  <?php if ($admin == 1){ ?>
  <form action="php/imgupload.php" method="post" enctype="multipart/form-data">
  <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
  <input class='inputfile1' id='file1' type="file" name="file">
  <label for="file1">(imagem para clique) Avatar.</label>
  <button class='upload' type="submit" name="upload">Upload</button>
  </form>
  <?php } }else{ ?>
  <?php if ($admin == 1){ ?>
  <form method='post' action='php/imgremove.php'>
  <input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
  <button class='removeavatar' type='submit'>Remover</button>
  </form>
  <?php }  ?>
  
  <?php }   ?>
  </td>
  
  
  <td class='prodname' data-id='<?php echo $row["item"];?>'> 
  <?php echo $row["item"];?>
  <br>
  
  <?php if ($admin == 1) { ?>
  <button class='deleteup' id='deleteup' data-id='<?php echo $row["id"]; ?>'>APAGAR</button>
  <?php } ?>
  </td>
  
  
  <td>
  <?php echo $row["price"] . ' €';?>
  </td>
  <?php
  
  if ($row["stock"] == '1') {
  echo 
  "<td class='verde lastchild'>Em stock.!</td>";
  } elseif ($row["stock"] == '2') {
  echo 
  "<td class='amarelo lastchild'>Pouco stock.</td>";
  } else {
  echo 
  "<td class='vermelho lastchild'>Fora de stock.</td>";
  }
  ?>
  
  
  
  
  </tr>
  <?php 
  } 
  ?>
  </table>
  <div class='nav' id='nav'></div>

<script>

$(document).ready(function() {
$('.addcart').click(function() {
var addcart = $(this).data('id');

if($('#mainlogin').text() == 'Login'){
  $('#loginfirst').show();
  $('#loginfirst').fadeOut(600);
}else{

$.post('php/carrinhocheckprod.php', {
produto: addcart
}, function(response) {
if (response == "stop") {
$('#produtonocarro').show();
$('#produtonocarro').fadeOut(600);
}else{

$.ajax({
type: "POST",
url: "php/addtocart.php",
data: {id:addcart}, // get all form field value in serialize form
success: function(data) {
$("#carrinho").load("php/carrinho.php");
$(".car").load("php/prodtotal.php");
$('#produtoaddcarro').show();
$('#produtoaddcarro').fadeOut(600);
}
});
}
});
}
});
return false;
});
</script>

<script>
$(document).ready(function(){
$('.detalhes').click(function(){
var prodname = $(this).data('id');

$.ajax({
type: "POST",
url: "php/itempage.php",
data: {prodname:prodname}, // get all form field value in serialize form
success: function(data) {
$('#itempage').animate().slideDown();
$('#itempage').html(data);
}
});
});
$('#itempage').click(function(){
$('#itempage').animate().slideUp();
});

});
</script>
<script>
        $(document).ready(function() {
            var rowsShown = 10;
            var rowsTotal = $('.insertable1 tr').length;
            var numPages = rowsTotal / rowsShown;
            for (i = 0; i < numPages; i++) {
                var pageNum = i + 1;
                $('#nav').append('<a href="#" page="' + i + '">' + pageNum + '</a> ');
            }
            $('.insertable1 tr').hide();
            $('.insertable1 tr').slice(0, rowsShown).show();
            $('#nav a:first').addClass('active');

            $('#nav a').bind('click', function() {
                $('#nav a').removeClass('active');
                $(this).addClass('active');
                var currPage = $(this).attr('page');
                var startItem = currPage * rowsShown;
                var endItem = startItem + rowsShown;
                $('.insertable1 tr')
                    .css('opacity', '0.0').hide().slice(startItem, endItem)
                    .css('display', 'table-row').animate({
                        opacity: 1
                    }, 300);
            });
        });
    </script>