<?php
require_once 'config.php';
session_start();


$username = $_SESSION['username'];
$id = $_POST['addcart'];

$sql1 = "SELECT * FROM produtos WHERE id = '$id'";
$result = $con->query($sql1);
while ($row = $result->fetch_assoc()) {
$produto = $row['produto'];
$quantidade = $row['quantidade'];
$price = $row['price'];
$stock = $row['stock'];
$img = $row['img'];
$price_final = $price * $quantidade;

if($_SESSION['username'] != null){
    
$sql = "INSERT INTO carrinho (produto,quantidade,price, price_final,username) VALUES (?,?,?,?,?)";
$stmtinsert = $con->prepare($sql);
$stmtinsert->bind_param('sssss',$produto,$quantidade,$price, $price_final,$username);
$result = $stmtinsert->execute();
if($result){
    $insert = $con->query("UPDATE carrinho SET img = '$img' WHERE produto = '$produto'");
}
header('location:../index.php');
}
}

