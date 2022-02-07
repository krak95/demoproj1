<?php
require_once 'config.php';
if (!isset($_POST['username'])) {
    exit;
}
$username = $_POST['username'];
$passwords = $_POST['password'];

        $sql = ("SELECT * FROM users WHERE username ='$username'");
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result) {

            while ($row = $result->fetch_assoc()) {
                $username = $row['username'];
                $hash   = $row['password'];
                $email = $row['email'];
                $name = $row['name'];
                $admin = $row['admin'];
                $result1 = (password_verify($passwords, $hash));


                if ($result1) {
                    echo "yes";
                } else {
                    echo "no";
                }
            }
        }