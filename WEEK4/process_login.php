<?php
include "db_connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users
WHERE username='$username'
AND password='$password'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    header("Location: dashboard.php");
}
else{
    echo "Invalid Username or Password";
}
?>