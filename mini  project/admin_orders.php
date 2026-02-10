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
    <title>Admin Orders</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #28a745;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 2em;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f9f9f9;
            color: #333;
        }

        td {
            background-color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        input[type="submit"] {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1em;
        }

        input[type="submit"]:hover {
            background-color: #c82333;
        }

        td form {
            margin: 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            font-size: 1.2em;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 0.9em;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<header>Admin Orders</header>

<div class="container">
    <h1>Order Tokens</h1>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>Food Item Name</th>
            <th>Quantity</th>
            <th>Token</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php
        $stmt = $pdo->query("
            SELECT o.id as order_id, o.user_id, u.username as user_name, f.name as food_name, o.quantity, o.token, o.status, o.created_at 
            FROM orders o
            JOIN users u ON o.user_id = u.id
            JOIN food_items f ON o.food_item_id = f.id
        ");
    
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['order_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['user_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['food_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
            echo "<td>" . htmlspecialchars($row['token']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td>
                    <form action='delete_order.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this order?\");'>
                        <input type='hidden' name='order_id' value='" . htmlspecialchars($row['order_id']) . "'>
                        <input type='submit' value='Delete'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
    
    <a href="admin.php">Back to Admin Dashboard</a>
</div>

<footer>
    <p>&copy; 2024 Online Food Ordering. All rights reserved.</p>
</footer>

</body>
</html>
