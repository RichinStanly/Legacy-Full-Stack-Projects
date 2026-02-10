<?php 
session_start(); 
include('db.php'); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete'])) {
    $item_id = $_GET['delete'];
    unset($_SESSION['cart'][$item_id]);

    $_SESSION['cart'] = array_values($_SESSION['cart']);

    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #ff9800;
            padding: 15px 0;
            text-align: center;
            color: white;
            font-size: 1.5em;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #ff9800;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .total-row {
            font-weight: bold;
            background-color: #f0f0f0;
        }

        .actions {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            text-decoration: none;
            background-color: #ff9800;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e68900;
        }

        .btn-secondary {
            background-color: #757575;
        }

        .btn-secondary:hover {
            background-color: #5a5a5a;
        }

        .btn-delete {
            text-decoration: none;
            color: red;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            table, th, td {
                font-size: 0.9em;
            }

            .btn {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <header>Your Cart</header>
    <div class="container">
        <?php if (empty($_SESSION['cart'])) : ?>
            <p style="text-align: center; font-size: 1.2em;">Your cart is empty.</p>
        <?php else : ?>
            <table>
                <tr>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <?php 
                $total = 0;
                foreach ($_SESSION['cart'] as $item_id => $item) : 
                    $item_total = $item['price'] * $item['quantity'];
                    $total += $item_total;
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td>Rs<?php echo number_format($item['price'], 2); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>Rs<?php echo number_format($item_total, 2); ?></td>
                        <td><a href="cart.php?delete=<?php echo $item_id; ?>" class="btn-delete">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td colspan="4">Grand Total</td>
                    <td>Rs<?php echo number_format($total, 2); ?></td>
                </tr>
            </table>

            <div class="actions">
                <a href="payment.php" class="btn">Proceed to Payment</a>
                <a href="index1.php" class="btn btn-secondary">Back to Home</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
