<?php
require_once 'config.php';
$del = $_POST['iddelete'];
$sql = "DELETE FROM teste WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $del);
$stmt->execute();