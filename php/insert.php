<?php
session_start();
require_once "config.php";

$produto    = $_POST['keyprod'];
$quantidade  = $_POST['keyquant'];
$price  = $_POST['keyprice'];
$stock = $_POST['keystock'];
$img = $_POST['img'] ?? null;

$sql = "INSERT INTO produtos (produto, quantidade, price, stock, img) VALUES(?,?,?,?,?)";
$stmtinsert = $con->prepare($sql);
$stmtinsert->bind_param('sssss', $produto, $quantidade, $price, $stock,$img);
$result = $stmtinsert->execute();
if ($result){
$prodid = $_SESSION['id'];
$prodname = $_SESSION['produto'];
$prodquant = $_SESSION['quantidade'];
$prodprice = $_SESSION['price'];
$prodstock = $_SESSION['stock'];
$prodimg = $_SESSION['img'];
}