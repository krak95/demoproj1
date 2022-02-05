<?php

$host = "127.0.0.1";

$db_name = "loscalmos";
$db_user = "root";
$db_pass = "server";

$con = mysqli_connect($host, $db_user, $db_pass, $db_name);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
  exit();
}
