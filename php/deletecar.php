<?php
require_once 'config.php';
$del = $_POST['id'];
$sql = "DELETE FROM carrinho WHERE carrinho_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('s',$del);
$stmt->execute();
if($stmt){
    echo '1';
    exit;
}else{
    echo '0';
    exit;
}