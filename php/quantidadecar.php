<?php
require_once 'config.php';
session_start();

$username = $_SESSION['username'];
$id = $_POST['id'] ?? null;
$quantidade = $_POST['quant'] ?? null;
$sql1 = "SELECT * FROM carrinho WHERE username = '$username'";
$result = $con->query($sql1);
while ($row = $result->fetch_assoc()) {
if($result){
$produto = $row['produto'];
$price = $row['price'];
}
if($_SESSION['username'] != null){
    $pricef = $quantidade * $price;
    $insert = $con->query("UPDATE carrinho SET quantidade = '$quantidade' WHERE produto = '$produto' AND username = '$username'");
    
}
if($insert){
    $insert1 = $con->query("UPDATE carrinho SET price_final = '$pricef' WHERE produto = '$produto' AND username = '$username'");
}
}
echo $pricef;
?>