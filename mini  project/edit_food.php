<?php 
session_start(); 
include('db.php'); 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
$food_item_id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM food_items WHERE id = ?");
$stmt->execute([$food_item_id]);
$food_item = $stmt->fetch();

if (!$food_item) {
    die("Food item not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food Item</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #28a745;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 2em;
        }

        .container {
            width: 70%;
            max-width: 1000px;
            margin: 30px auto;
            padding: 30px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-size: 1.1em;
            color: #555;
        }

        input[type="text"], input[type="number"], textarea {
            padding: 12px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="file"] {
            padding: 5px;
            font-size: 1em;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px;
            font-size: 1.1em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            font-size: 1.1em;
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
            .container {
                width: 90%;
                padding: 20px;
            }

            form {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<header>Edit Food Item</header>

<div class="container">
    <form action="edit_food_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($food_item['id']); ?>">

        <label for="name">Food Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($food_item['name']); ?>" required>

        <label for="description">Food Description</label>
        <textarea name="description" required><?php echo htmlspecialchars($food_item['description']); ?></textarea>

        <label for="price">Price (Rs)</label>
        <input type="number" name="price" value="<?php echo htmlspecialchars($food_item['price']); ?>" required step="0.01">

        <label for="image">Food Image</label>
        <input type="file" name="image" accept="image/*">

        <button type="submit">Update Food</button>
    </form>

    <a href="manage_food.php" class="back-link">Back to Manage Food</a>
</div>

<footer>
    <p>&copy; 2024 Online Food Ordering. All rights reserved.</p>
</footer>

</body>
</html>
