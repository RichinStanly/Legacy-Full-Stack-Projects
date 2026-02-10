<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id']; 
    $stmt = $pdo->query("SELECT MAX(token) AS max_token FROM orders");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $token = (int) $row['max_token'] + 1;

    if (!$row['max_token']) {
        $token = 1;
    }

    $food_item_id = 1;
    $quantity = 1;
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, food_item_id, quantity, token, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$userId, $food_item_id, $quantity, $token, 'completed']);

    header("Location: success.php?token=$token");
}
?>
