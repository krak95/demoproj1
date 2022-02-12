<?php
require_once 'config.php';
session_start();


$id = $_POST['id'];


$targetDir = "../img\img";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["upload"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $con->query("UPDATE produtos SET img ='$fileName' WHERE id = '$id'");
            if($insert){
                
            }
                
        } 
        }
            
        
    }   

header('location:../index.php');

?>