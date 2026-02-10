<?php
session_start();
include('db.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$food_item_id = $_GET['id'] ?? null;

if ($food_item_id) {
    $stmt = $pdo->prepare("DELETE FROM food_items WHERE id = ?");
    $stmt->execute([$food_item_id]);
}

header("Location: manage_food.php");
?>
