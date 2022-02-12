<?php
require_once "config.php";
?>
 <table id="insertable1">
               

<?php $sql = "SELECT * FROM produtos";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {


?>
<tr>

<td>

<?php
if ($row['img'] == null){?>
<form id='uploadimg' action="php/imgUPLOAD.php" method="post" enctype="multipart/form-data">
<input type='hidden' name='id' value='<?php echo $row['id'];?>' />
<input class='inputfile' id='file' type="file" name="file">
<label for="file">(imagem para clique) Avatar.</label><br><br>

<button id='upload' type="submit" name="upload" >Upload</button>
</form>
</td>
<?php ;}else{
?>
<div style="background-color:black;"><img style="max-width:50px;" src="img/img<?php echo $row['img']; ?>"></div>
<?php
}?>

<?php if ($row['img'] != null){?>
<form method='post' action='php/imgREMOVE.php'>
<input type='hidden' name='id' value='<?php echo $row['id'];?>' />
<button id='removeavatar' type='submit'>Remover</button>
</form>
<?php ;} ?>
</td>

<td>
<form method='post' action='php/addtocart.php'>
<input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
</form>
</td>

<td>
<?php echo $row["produto"]; ?>
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
}
?>
</tr>

<tr><th id='bordernone'><div id='lastdiv'></div></th></tr>

</table>