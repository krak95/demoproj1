<?php
require_once 'config.php';
session_start();

$username = $_SESSION['username'];
$id = $_POST['id'] ?? null;
$quantidade = $_POST['quant'] ?? null;
