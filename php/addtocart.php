<?php
require_once 'config.php';
session_start();

$count = 0;
$username = $_SESSION['username'];
$id = $_POST['id'];
$sql1 = "SELECT * FROM produtos WHERE id = '$id'";
$result = $con->query($sql1);
while ($row = $result->fetch_assoc()) {
if($result){
$produto = $row['produto'];
$price = $row['price'];
$stock = $row['stock'];
$img = $row['img'];
}
if($_SESSION['username'] != null){
    
$sql = "INSERT INTO carrinho (produto,price,username) VALUES (?,?,?)";
$stmtinsert = $con->prepare($sql);
$stmtinsert->bind_param('sss',$produto,$price,$username);
$result1 = $stmtinsert->execute();
if($result1){
    $insert = $con->query("UPDATE carrinho SET img = '$img' WHERE produto = '$produto'");
}
if($insert){}
}

}