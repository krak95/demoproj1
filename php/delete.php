<?php
require_once "config.php";
$id = $_GET['id']; // get id through query string
$sql = "DELETE FROM teste WHERE id='$id'"; // delete query
$stmtdel = $con->prepare($sql);
$result = $stmtdel->execute();