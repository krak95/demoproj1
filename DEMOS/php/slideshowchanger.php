<?php
include_once "conf.php";

$prodname = $_POST['prodname'];//echo $prodname;
$mapa = $_POST['mapa'];//echo $mapa;

$sql = "SELECT * FROM produtos WHERE produto = '$prodname' AND mapa='$mapa'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
$prod = $row['produto'];
$price = $row['price'];
$stock = $row['stock'];
$img = $row['img'];
$utube = $row['utube']; 
?>
<iframe class='utube' src="<?php echo $utube ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
</iframe>
<?php
}