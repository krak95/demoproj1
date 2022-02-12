<?php
require_once 'config.php';
session_start();



$sql1 = "SELECT * FROM produtos";
$result = $con->query($sql1);
while ($row = $result->fetch_assoc()) {
$produto = $row['produto'];
$quantidade = $row['quantidade'];
$price = $row['price'];
$stock = $row['stock'];
$img = $row['img'];

$price_final = $price * $quantidade;
$username = $_SESSION['username'];
if($_SESSION['username'] != null){
    
$sql = "INSERT INTO carrinho (produto,quantidade,price, price_final,img,username) VALUES (?,?,?,?,?,?)";
$stmtinsert = $con->prepare($sql);
$stmtinsert->bind_param('sssssb', $produto,$quantidade,$price, $price_final, $username, $img);
$result = $stmtinsert->execute();
header('location:../index.php');
}
}

