<?php
require_once 'config.php';
$sql = "DELETE FROM teste";
$stmt = $con->prepare($sql);
$stmt->execute();
if($stmt){
    header('location:../index.php');
}