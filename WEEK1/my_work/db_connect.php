<?php
$host = "localhost";
$dbname = "test_db";
$username = "root";
$password = "";

try {
    // Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set error mode
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h2 style='color:green;'>Database Connected Successfully ✅</h2>";

} catch (PDOException $e) {
    echo "<h2 style='color:red;'>Connection Failed ❌</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
}
?>