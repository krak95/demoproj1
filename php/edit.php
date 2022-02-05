<?php
require_once "config.php";
$produto    = $_GET['produto'];
$quantidade  = $_GET['quantidade'];
$price  = $_GET['price'];
   $sql = "UPDATE teste SET produto='$produto', quantidade='$quantidade', price='$price' WHERE id='$id'";
   $stmtinsert = $con->prepare($sql);
   $stmtinsert->bind_param('ssss', $produto, $quantidade, $price, $id);
   if ($produto != null && $quantidade != null && $price != null) {
       $result = $stmtinsert->execute();
       header("location:../table.php");
       echo ""; 
    }else {
       echo "Error deleting record";
       exit();
}