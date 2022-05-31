<?php
require_once 'config.php';
session_start();
$username = $_SESSION['username'];

$sql = $con->query("SELECT * FROM carrinho WHERE username = '$username'");

while ($row = mysqli_fetch_assoc($sql)) {
$prod = $row['item'];
$price = $row['price'];
$quant = $row['quantidade'];
$finalprice = $row['price_final'];
?>		

<html>
<head>
<style>

.emailencomenda {	
width:60%;
z-index: 30;
left: 0;  
text-align: center;
border-collapse:separate; 
border-spacing:0 10px;
font-size: large;
}

.emailencomenda tr {
background-color:#e1ebff;
border: 1px solid #e1ebff;
height:50px;	
}
.emailencomenda tr:hover {
border: 1px solid #e1ebff;
box-shadow: 4px 4px 4px 4px #00bfff;
background-color:#505C75;
height:50px;
}

.emailencomenda td {	
	width:25%;
}

</style>
</head>
<body>
<table class='emailencomenda'>
<tr>

<td>
<?php echo $prod; ?>
</td>

<td>
<?php echo 'Preço p/uni. '.$price.' €'; ?>
</td>

<td>
<?php echo 'x'.$quant; ?>
</td>

<td>
<?php echo 'Total:'.$finalprice.' €'; ?>
</td>

</tr>
</table>
</body>
</html>

<?php }
if ($sql){
$sql1 = $con->query("DELETE FROM carrinho WHERE username = '$username'");
}
