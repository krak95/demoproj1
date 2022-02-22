<?php
require_once 'config.php';
session_start();


$username = $_SESSION['username'];
$id = $_POST['id'];
$quantidade = $_POST['quantidade'];
$sql1 = "SELECT * FROM produtos WHERE id = '$id'";
$result = $con->query($sql1);
while ($row = $result->fetch_assoc()) {
if($result){
$produto = $row['produto'];
$price = $row['price'];
$stock = $row['stock'];
$img = $row['img'];
$price_final = $price * $quantidade;
}
if($_SESSION['username'] != null){
    
$sql = "INSERT INTO carrinho (produto,quantidade,price, price_final,username) VALUES (?,?,?,?,?)";
$stmtinsert = $con->prepare($sql);
$stmtinsert->bind_param('sssss',$produto,$quantidade,$price, $price_final,$username);
$result1 = $stmtinsert->execute();
if($result1){
    $insert = $con->query("UPDATE carrinho SET img = '$img' WHERE produto = '$produto'");
}
if($insert){}
}

}