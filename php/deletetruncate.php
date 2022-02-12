<?php
require_once 'config.php';
$sql = "TRUNCATE produtos";
$stmt = $con->prepare($sql);
$stmt->execute();
if($stmt){
    header('location:../index.php');
}