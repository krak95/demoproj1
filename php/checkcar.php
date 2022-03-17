<?php

session_start();
require_once 'config.php';

$username = $_SESSION['username'];
$produto = $_POST['produto'];
$stmt = $con->prepare("SELECT * FROM carrinho WHERE username = ? AND produto = ? ");
$stmt->bind_param("ss", $username, $produto);
$stmt->execute();
$arr = $stmt->get_result()->fetch_row()[0] ?? null;

if ($arr == '') {
    die('go');
} else {
    die('stop');
}
