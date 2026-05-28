<?php
$password = "";

$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];

    if (strlen($password) < 6) {
        $result = "Weak password ❌ (Too short)";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $result = "Weak password ❌ (Add uppercase letter)";
    } elseif (!preg_match("/[0-9]/", $password)) {
        $result = "Weak password ❌ (Add a number)";
    } else {
        $result = "Strong password ✅";
    }
}
?>

<form method="POST">
    Enter Password: <input type="text" name="password">
    <button type="submit">Check</button>
</form>

<h3><?php echo $result; ?></h3
