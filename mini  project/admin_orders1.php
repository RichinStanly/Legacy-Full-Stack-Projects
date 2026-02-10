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
    <title>Admin Orders</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Order Tokens</h1>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Food Item ID</th>
            <th>Quantity</th>
            <th>Token</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM orders");
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['food_item_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
            echo "<td>" . htmlspecialchars($row['token']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="admin.php">Back to Admin Dashboard</a>
</body>
</html>
