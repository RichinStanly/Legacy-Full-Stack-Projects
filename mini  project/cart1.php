<?php 
session_start(); 
include('db.php'); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <style>
        body { font-family: Arial, sans-serif; }
        nav { margin: 20px 0; }
    </style>
</head>
<body>
    <h1>Your Cart</h1>
    <a href="payment.php">Proceed to Payment</a>
    <a href="index1.php">Back to Home</a>
</body>
</html>
