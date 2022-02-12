<?php

session_start();
require_once 'config.php';
require_once 'avatarcheck.php';
$img = $_POST['id'];
$stmt1 = $con->prepare("UPDATE produtos SET img = null WHERE id = '$img'");
$stmt1->execute();
header('location:../index.php');
