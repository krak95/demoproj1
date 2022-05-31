<?php
require_once 'config.php';
session_start();
$username = $_SESSION['username'];

$sql1 = $con->query("DELETE FROM carrinho WHERE username = '$username'");