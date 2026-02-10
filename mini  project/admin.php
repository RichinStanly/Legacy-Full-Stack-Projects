<?php 
session_start(); 
include('db.php'); 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }

        nav {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            justify-content: center;
            width: 80%;
        }

        nav a {
            text-decoration: none;
            color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 0 10px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #e0e0e0;
        }

        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                width: 90%;
            }
            nav a {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <nav>
        <a href="add_food.php">Add Food</a>
        <a href="manage_food.php">Manage Food</a>
        <a href="admin_orders.php">View Orders</a>
        <a href="index1.php">Home</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>
