<?php
require_once 'config.php';
session_start();

$username = $_SESSION['username'];


$stmt = $con->prepare("INSERT INTO encomenda (price_final,produto,img,username,quantidade,price,id_prod) 
SELECT price_final,produto,img,username,quantidade,price,id_prod FROM carrinho WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();