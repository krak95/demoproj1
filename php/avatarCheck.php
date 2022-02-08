<?php
require_once 'config.php';
$username = $_SESSION['username'] ?? null;
$stmt = $con->prepare("SELECT avatar FROM users WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$res = $stmt->get_result();
while($row = mysqli_fetch_array($res)){
    $_SESSION['avatar'] = $row['avatar'];
    
    echo $row['avatar'];
}