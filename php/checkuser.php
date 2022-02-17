<?php
require_once 'config.php';
if (!isset($_POST['username'])) {
    exit;
}

$stmt = $con->prepare("SELECT username FROM users WHERE username = ? ");
$stmt->bind_param("s", $_POST['username']);
$stmt->execute();
$arr = $stmt->get_result()->fetch_row()[0];
if ($arr != '') {
    die('false');
} else {
    die('true');
}
