<?php
session_start();
include('db.php'); 

$token = $_GET['token'] ?? null;

if ($token === null) {
    header("Location: index1.php");
    exit();
}

$stmt = $pdo->prepare("
    SELECT o.id AS order_id, f.name AS food_name, o.quantity, u.username AS user_name 
    FROM orders o
    JOIN food_items f ON o.food_item_id = f.id
    JOIN users u ON o.user_id = u.id
    WHERE o.token = :token
");
$stmt->bindParam(':token', $token, PDO::PARAM_STR);
$stmt->execute();

$order = $stmt->fetch();

if (!$order) {
    header("Location: index1.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
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
            max-width: 900px;
            margin: 30px auto;
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .container h2 {
            text-align: center;
            color: #28a745;
            margin-bottom: 20px;
            font-size: 1.8em;
        }

        .container p {
            text-align: center;
            color: #555;
            font-size: 1.2em;
        }

        .token-number {
            text-align: center;
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 6px;
            font-size: 1.4em;
            font-weight: bold;
            margin: 20px 0;
            color: #007bff;
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
            background-color: #f8f9fa;
            color: #333;
        }

        td {
            background-color: #f9f9f9;
        }

        .btn {
            display: block;
            text-align: center;
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            margin-top: 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 1.2em;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>

<header>Payment Successful</header>

<div class="container">
    <h2>Thank You for Your Purchase!</h2>
    <p>Your payment was successfully processed. Here are the details of your order:</p>

    <div class="token-number">
        <p>Your Payment Token: <strong><?php echo htmlspecialchars($token); ?></strong></p>
    </div>

    <h3>Order Details</h3>
    <table>
        <tr>
            <th>Food Item Name</th>
            <th>Quantity</th>
            <th>User Name</th>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($order['food_name']); ?></td>
            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
            <td><?php echo htmlspecialchars($order['user_name']); ?></td>
        </tr>
    </table>

    <a href="index1.php" class="btn">Back to Home</a>
</div>

<footer>
    <p>&copy; 2024 Online Food Ordering. All rights reserved.</p>
</footer>

</body>
</html>
