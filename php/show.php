<?php
session_start();
require_once "config.php";
$admin = $_SESSION['admin'];
?>


<table class="insertable1">


<?php 

$sql = "SELECT * FROM produtos";
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