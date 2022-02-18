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