<?php 
include 'db.php'; 
session_start();

// Redirect to login if not logged in
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - StudentHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .navbar { background: rgba(0,0,0,0.85) !important; }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            transition: all 0.3s;
        }
        .card:hover {
            transform: translateY(-8px);
        }
        .hero {
            color: white;
            padding: 60px 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🎓 StudentHub</a>
        <div class="ms-auto d-flex align-items-center">
            <span class="text-light me-3">
                Welcome, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> 
                (<?= ucfirst($_SESSION['role']) ?>)
            </span>
            <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="hero">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Welcome Back!</h1>
        <p class="lead">Student Management System</p>
    </div>
</div>

<div class="container">
    <div class="row g-4">
        <!-- Dashboard Cards -->
        <div class="col-md-4">
            <div class="card text-center p-4">
                <i class="fas fa-user-graduate fa-3x mb-3 text-primary"></i>
                <h4>Total Students</h4>
                <h2 class="text-primary">1,248</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-4">
                <i class="fas fa-book fa-3x mb-3 text-success"></i>
                <h4>Active Courses</h4>
                <h2 class="text-success">87</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-4">
                <i class="fas fa-chalkboard-teacher fa-3x mb-3 text-warning"></i>
                <h4>Teachers</h4>
                <h2 class="text-warning">64</h2>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href