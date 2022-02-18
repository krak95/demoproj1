<?php
session_start();
require_once "config.php";
$admin = $_SESSION['admin'];
?>
<table id="insertable1">


<?php 
$sql = "SELECT * FROM produtos";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {


?>
<tr>

<td>
<?php if ($row['img'] == null){ ?>
<?php if ($admin == 1){ ?>
<form action="php/imgUPLOAD.php" method="post" enctype="multipart/form-data">
<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
<input class='inputfile1' id='file1' type="file" name="file">
<label for="file1">(imagem para clique) Avatar.</label><br><br>
<button class='upload' type="submit" name="upload">Upload</button>
</form>
</td>
<?php } }else{ ?>
<?php if ($admin == 1){ ?>


<form method='post' action='php/imgREMOVE.php'>
<input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
<button class='removeavatar' type='submit'>Remover</button>
</form>
<?php }  ?>
<div style="background-color:black;"><img style="max-width:50px;" src="img/img<?php echo $row['img']; ?>"></div>

<?php }  ?>
</td>

<td>
<button class='addcart' data-id='<?php echo $row["id"]; ?>'> addcart </button>
<input class='quantidade' type="text">
</td>

<td>
<?php echo $row["produto"];?>
<br> REF: <?php
      echo $row['id']; ?>
      
<?php if ( $admin == 1) { ?>
<br><button class='deleteup' data-id='<?php echo $row["id"]; ?>'>APAGAR</button>
<?php } ?>
</td>

<td>
<?php echo $row["price"] . " €";   ?>
</td>

<?php
if ($row["stock"] == '1') {
echo 
"<td class='verde'>Em stock.</td>";
} elseif ($row["stock"] == '2') {
echo 
"<td class='amarelo'>Pouco stock.</td>";
} else {
echo 
"<td class='vermelho'>Fora de stock.</td>";
}
?>


</tr>
<?php 
} 
?>


<tr><th id='bordernone'><div id='lastdiv'></div></th></tr>

</table>