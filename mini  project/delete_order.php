<?php 
session_start(); 
include('db.php'); 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    $stmt = $pdo->prepare("DELETE FROM orders WHERE id = :id");
    $stmt->bindParam(':id', $order_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: admin_orders.php?message=Order+deleted+successfully.");
        exit();
    } else {
        header("Location: admin_orders.php?error=Failed+to+delete+order.");
        exit();
    }
}
?>
