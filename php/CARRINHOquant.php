<?php
require_once 'config.php';
session_start();

$username = $_SESSION['username'];
$id = $_POST['id'] ?? null;
$quantidade = $_POST['quant'];
if($quantidade != null){
if($_SESSION['username'] != null){
    $insert = $con->prepare("UPDATE carrinho SET quantidade = ? WHERE id_prod = ? AND username = ?");
    $insert->bind_param("sss",$quantidade, $id, $username);
    $insert->execute();
   
if($insert){
    $result = $con->prepare("SELECT price FROM carrinho WHERE id_prod = ? AND username = ?");
    $result->bind_param("ss", $id, $username);
    $result->execute();
    $result1 = $result->get_result();
    while ($row = $result1->fetch_assoc()) {
    $price = $row['price'] ?? null;
    $pricef = $quantidade * $price;
    $insert1 = $con->prepare("UPDATE carrinho SET price_final = ? WHERE id_prod = ? AND username = ?");
    $insert1->bind_param("sss", $pricef, $id, $username);
    $insert1->execute();
    }
}
$result = $con->prepare("SELECT price_final FROM carrinho WHERE id_prod = ? AND username = ?");
$result->bind_param("ss", $id, $username);
$result->execute();
$arr = $result->get_result()->fetch_row()[0] ?? null;
echo $arr.' €';
}
else
{
}
}