<?php
session_start();
require_once "config.php";

$item    = $_POST['keyprod'];
$price  = $_POST['keyprice'];
$stock = $_POST['keystock'];
$img = $_POST['img'] ?? null;

$sql = "INSERT INTO produtos (item, price, stock, img) VALUES(?,?,?,?)";
$stmtinsert = $con->prepare($sql);
$stmtinsert->bind_param('ssss', $item, $price, $stock,$img);
$result = $stmtinsert->execute();