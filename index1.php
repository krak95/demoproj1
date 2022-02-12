<?php
require_once "php/config.php";
session_start();
$username = $_SESSION['username'] ?? null;
$admin = $_SESSION['admin'] ?? null;
if($admin == 'admin'){
echo "<div class='adminalert'><a href='table.php'><p>ADMIN ROOM</p></a></div>";
} 
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">

<head>
<title>LosCalmos</title>
<link rel="stylesheet" href="css/mystyle.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>

<div id="arrayel">
<table>
<tr>

<td>

</td>

</tr>
</table>
</div>

</body>

</html>