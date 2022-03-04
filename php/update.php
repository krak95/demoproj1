<?php
require_once "config.php";

$produto    = $_POST['produto'];
$price  = $_POST['price'];
$id = $_POST['id'];
$stock = $_POST['stock'];

$sql = "UPDATE produtos SET produto = '$produto', price = '$price', stock = '$stock' WHERE id='$id'";
$stmtinsert = $con->prepare($sql);
$result = $stmtinsert->execute();