<?php

include "db_connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){

        echo "All fields are required";

    }
    else{

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

    }

}

?>