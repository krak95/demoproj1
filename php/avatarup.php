<?php
session_start();
require_once 'config.php';


$username = $_SESSION['username'];


$targetDir = "../img/avatar";
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
            $insert = $con->query("UPDATE users SET avatar ='$fileName' WHERE username = '$username'");
            if($insert){
                
            }
                
        } 
        }
            
        
    }   
    
header('location:../index.php');