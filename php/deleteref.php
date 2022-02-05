<?php
require_once "config.php";
$id     = $_POST['id'];
$sql    = "DELETE FROM teste WHERE id='$id'";
$stmtdel = $con->prepare($sql);
$result = $stmtdel->execute();