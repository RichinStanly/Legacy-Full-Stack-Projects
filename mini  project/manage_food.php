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
    <title>Manage Food Items</title>
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
            font-weight: bold;
        }

        td {
            background-color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-size: 1.1em;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #f1f1f1;
            color: #0056b3;
        }

        .delete-btn {
            color: #dc3545;
            font-weight: bold;
        }

        .delete-btn:hover {
            color: #c82333;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            font-size: 1.2em;
            text-decoration: none;
            transition: color 0.3s;
        }

        .back-link:hover {
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

<header>Manage Food Items</header>

<div class="container">
    <h1>Food Items List</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM food_items");
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
            echo "<td>Rs" . number_format($row['price'], 2) . "</td>";
            echo "<td><img src='" . htmlspecialchars($row['image_url']) . "' alt='Food Image' width='50'></td>";
            echo "<td>
                    <a href='edit_food.php?id=" . htmlspecialchars($row['id']) . "'>Edit</a> | 
                    <a href='delete_food.php?id=" . htmlspecialchars($row['id']) . "' class='delete-btn' onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="admin.php" class="back-link">Back to Admin Dashboard</a>
</div>

<footer>
    <p>&copy; 2024 Online Food Ordering. All rights reserved.</p>
</footer>

</body>
</html>
