<?php
// db.php - SINGLE Database Connection File

$host = 'localhost';
$dbname = 'student_managment';   // Correct spelling
$username = 'root';
$password = '';   

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    die("Connection Failed: " . $e->getMessage());
}
?>
