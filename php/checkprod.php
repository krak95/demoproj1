<?php
require_once 'config.php';

$prod = $_POST['prod'];

if (!isset($prod)) {
    exit;
}

$stmt = $con->prepare("SELECT produto FROM produtos WHERE produto = ? ");
$stmt->bind_param("s", $prod);
$stmt->execute();
$arr = $stmt->get_result()->fetch_row()[0] ?? null;
if ($arr != '') {
    die('stop');
} else {
    die('go');
}
