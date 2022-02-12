<?php

session_start();
require_once 'config.php';
require_once 'avatarcheck.php';
$username = $_SESSION['username'];
$stmt1 = $con->prepare("UPDATE users SET avatar = null WHERE username = '$username'");
$stmt1->execute();
header('location:../index.php');
