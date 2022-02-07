<?php
require_once 'config.php';
if (!isset($_POST['email'])) {
    exit;
}

$email = $_POST['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "true";
} else {
  echo "false";
}
?>