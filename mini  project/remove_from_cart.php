<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $item_id) {
                unset($_SESSION['cart'][$key]); 
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
        }
    }

    header('Location: cart.php');
    exit();
} else {
 
    header('Location: index1.php');
}
