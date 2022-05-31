<?php
require_once "config.php";
  $name    = $_POST['name'];
  $username  = $_POST['username'];
  $password  = $_POST['password'];
  $email    = $_POST['email'];
  $sql = "INSERT INTO users (name, username, password, email) VALUES(?,?,?,?)";
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmtinsert = $con->prepare($sql);
  $stmtinsert->bind_param('ssss', $name, $username, $hash, $email);
  $result = $stmtinsert->execute();
