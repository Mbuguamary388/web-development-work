<?php 
include 'db.php'; 
session_start();

if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = "";
$success = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];   // All user levels

    // Check if username or email already exists
    $check = $conn->prepare("SELECT username FROM users WHERE username = ? OR email = ?");
    $check->execute([$username, $email]);
    
    if($check->rowCount() > 0) {
        $error = "Username or Email already taken!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("INSERT INTO users 
            (username, full_name, email, password, role) 
            VALUES (?, ?, ?, ?, ?)");
        
        if($stmt->execute([$username, $full_name, $email, $hashed_password, $role])) {
            $success = "✅ Registration Successful! You can now login.";
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - StudentHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            min-height: 100vh; 
        }
        .card { max-width: 480px; margin: 80px auto; border-radius: 15px; }
    </style>
</head>
<body>
<div class="container">
    <div class="card shadow">
        <div class="card-body p-5">
            <h2 class="text-center mb-4">🎓 Create New Account</h2>
            
            <?php if($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>
            <?php if($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Register As (User Level)</label>
                    <select name="role" class="form-control" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="manager">Manager</option>
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100 py-2">Register Account</button>
            </form>

            <div class="text-center mt-4">
                Already have an account? <a href="login.php">Login here</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>