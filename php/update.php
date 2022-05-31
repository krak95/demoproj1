<?php
require_once "config.php";

$produto    = $_POST['keyprod'] ?? null;
$ref  = $_POST['keyref']; echo $ref;
$price  = $_POST['keyprice'] ?? null;
$stock = $_POST['keystock'];echo $stock;

$sql = "UPDATE produtos SET produto = '$produto', price = '$price', stock = '$stock' WHERE id = '$ref'";

$sql1 = "UPDATE produtos SET price = '$price', stock = '$stock' WHERE id = '$ref'";

$sql2 = "UPDATE produtos SET produto = '$produto', stock = '$stock' WHERE id = '$ref'";
if ($produto != '' || $price != ''){
    
$stmtinsert = $con->prepare($sql);
}
if ($produto == '' || $price != ''){
    
$stmtinsert = $con->prepare($sql1);
}
if ($produto != '' || $price == ''){
    
$stmtinsert = $con->prepare($sql2);
}
$result = $stmtinsert->execute();