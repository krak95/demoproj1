<?php
require_once 'config.php';
session_start();

$username = $_SESSION['username'];
$id = $_POST['id'] ?? null;
$quantidade = $_POST['quant'] ?? null;
$result = $con->prepare("SELECT price_final FROM carrinho WHERE produto = ? AND username = ?");
$result->bind_param("ss", $id, $username);
$result->execute();
$arr = $result->get_result()->fetch_row()[0] ?? null;
echo $arr;