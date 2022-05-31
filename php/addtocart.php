<?php
require_once 'config.php';
session_start();

$count = 0;
$username = $_SESSION['username'];
$id = $_POST['id']; echo $id;
$sql1 = "SELECT * FROM produtos WHERE id = '$id'";
$result = $con->query($sql1);
while ($row = $result->fetch_assoc()) {
if($result){
$produto = $row['item']; echo $produto;
$price = $row['price'];
$stock = $row['stock'];
$img = $row['img'];

if($_SESSION['username'] != null){
    
$stmt = $con->prepare("SELECT * FROM carrinho WHERE username = ? AND item = ? ");
$stmt->bind_param("ss", $username, $produto);
$stmt->execute();
$arr = $stmt->get_result()->fetch_row()[0] ?? null;

if ($arr == '') {
$sql = "INSERT INTO carrinho (item,price,username,price_final,id_prod) VALUES (?,?,?,?,?)";
$stmtinsert = $con->prepare($sql);
$stmtinsert->bind_param('sssss',$produto,$price,$username,$price,$id);
$result1 = $stmtinsert->execute();
}
    $insert = $con->query("UPDATE carrinho SET img = '$img' WHERE item = '$produto'");

}
}
}