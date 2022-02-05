<?php
require_once 'config.php';
$sql = "TRUNCATE teste";
$stmt = $con->prepare($sql);
$stmt->execute();
if($stmt){
    header('location:../empty.php');
}