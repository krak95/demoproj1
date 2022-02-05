<?php
require_once "config.php";
$produto    = $_POST['produto'];
$quantidade  = $_POST['quantidade'];
$price  = $_POST['price'];
$stock = $_POST['stock'];

$sql = "INSERT INTO teste (produto, quantidade, price, stock) VALUES(?,?,?,?)";
$stmtinsert = $con->prepare($sql);
$stmtinsert->bind_param('ssss', $produto, $quantidade, $price, $stock);
$result = $stmtinsert->execute();