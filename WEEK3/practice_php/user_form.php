<!DOCTYPE html>
<html>
<head>
    <title>User Input</title>
</head>
<body>

<h2>Enter Your Details</h2>

<form method="POST" action="">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    echo "<h3>Welcome, $name</h3>";
    echo "<p>Your email is: $email</p>";
}
?>

</body>
</html>
