<?php
session_start();
unset($_SESSION);
unset($admin);
unset($username);
unset($emails);
session_destroy();
session_write_close();
header('location:../empty.php');
echo ""; 
exit();