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

<?php
if ($row['img'] == null){?>
<form action="php/imgUPLOAD.php" method="post" enctype="multipart/form-data">
<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
<input class='inputfile1' id='file1' type="file" name="file">
<label for="file1">(imagem para clique) Avatar.</label><br><br>

<button class='upload' type="submit" name="upload">Upload</button>
</form>
</td>
<?php }else{
?>
<div style="background-color:black;"><img style="max-width:50px;" src="img/img<?php echo $row['img']; ?>"></div>
<form method='post' action='php/imgREMOVE.php'>
<input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
<button class='removeavatar' type='submit'>Remover</button>
</form>
<?php } ?>
</td>

<td>
<button class='addcart' data-id='<?php echo $row["id"]; ?>'> addcart </button>
</td>

<td>
<?php echo $row["produto"];?>
<br> REF: <?php
      echo $row['id']; ?>
</td>

<td>
<?php echo $row["quantidade"]; ?>
</td>

<td>
<?php echo $row["price"] . " €";   ?>
</td>

<?php
if ($row["stock"] == '1') {
echo "<td class='verde'></td>";
} elseif ($row["stock"] == '2') {
echo "<td class='amarelo'></td>";
} else {
echo "<td class='vermelho'></td>";
}
?>

<?php if ( $admin == 1) { ?>
<td>
<button class='deleteup' data-id='<?php echo $row["id"]; ?>'><?php echo $row["id"]; ?></button>


</td>
<?php } ?>

</tr>
<?php 
} 
?>


<tr><th id='bordernone'><div id='lastdiv'></div></th></tr>

</table>