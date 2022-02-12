<?php
session_start();
unset($_SESSION);
unset($admin);
unset($username);
unset($emails);
unset($name);
unset($password);
unset($avatar);
session_destroy();
session_write_close();
header('location:../index.php');
echo ""; 
exit();