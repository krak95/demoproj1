<?php
require_once "config.php";

    $produto    = $_POST['produto'];
    $quantidade  = $_POST['quantidade'];
    $price  = $_POST['price'];
    $id = $_POST['id'];
    $stock = $_POST['stock'];

    $sql = "UPDATE teste SET produto= $produto,quantidade=$quantidade,price=$price,stock=$stock WHERE id='$id'";
    $stmtinsert = $con->prepare($sql);
    $result = $stmtinsert->execute();