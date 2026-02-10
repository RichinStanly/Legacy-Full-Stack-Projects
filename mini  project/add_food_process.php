<?php
session_start();
include('db.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $stmt = $pdo->prepare("INSERT INTO food_items (name, description, price, image_url) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $price, $target]);
        echo "Food item added successfully!";
    } else {
        echo "Failed to upload image.";
    }
}
?>
<a href="admin.php">Back to Admin Dashboard</a>
