<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $food_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $quantity = 1;

    $_SESSION['cart'][] = [
        'id' => $food_id,
        'name' => $food_name,
        'price' => $food_price,
        'quantity' => $quantity,
    ];

    if (isset($_POST['buy_now']) && $_POST['buy_now'] == 'true') {
        header("Location: payment.php");
        exit();
    }

    header("Location: food_list.php");
    exit();
}
