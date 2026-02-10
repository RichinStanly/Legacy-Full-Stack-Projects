<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Home</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #fefefe;
            background-image: url('home.jpg'); 
            background-size: cover;
            background-position: center;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        header h1 {
            font-size: 24px;
            color: #333;
        }

        header nav a {
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
            color: #555;
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #ff6347;
        }

        .hero-section {
            text-align: center;
            padding: 50px;
            background: rgba(255, 255, 255, 0.8); 
            margin-top: 20px;
            border-radius: 10px;
            transition: background 0.3s ease;
        }

        .hero-section h2 {
            font-size: 36px;
            color: #222;
        }

        .hero-section p {
            font-size: 18px;
            color: #555;
            margin: 20px 0;
        }

        .hero-section .buttons {
            margin-top: 20px;
        }

        .hero-section .buttons a {
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            color: white;
            background-color: #ff6347;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        .hero-section .buttons a:hover {
            background-color: #e5533f;
        }

        .food-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px 50px;
        }

        .food-item {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .food-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .food-item h3 {
            margin: 10px 0;
            font-size: 20px;
            color: #333;
        }

        .food-item p {
            margin: 5px 0;
            color: #777;
        }

        .food-item a {
            display: inline-block;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            background-color: #ff6347;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .food-item a:hover {
            background-color: #e5533f;
        }

    
        body.dark-mode {
            background-color: #333;
            color: #fefefe;
        }

        header.dark-mode {
            background-color: #444;
        }

        header.dark-mode nav a {
            color: #ddd;
        }

        .hero-section.dark-mode {
            background: rgba(0, 0, 0, 0.7); 
            color: white;
        }

        .hero-section.dark-mode h2, .hero-section.dark-mode p {
            color: white;
        }

        .food-item.dark-mode {
            background-color: #444;
            border-color: #666;
        }

        .food-item.dark-mode h3, .food-item.dark-mode p {
            color: #fefefe;
        }

        .food-item.dark-mode a {
            background-color: #e5533f;
        }

        .toggle-btn {
            position: fixed;
            bottom: 20px; 
            left: 20px;
            background-color: #ff6347;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            z-index: 10;
        }

        .toggle-btn:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <button class="toggle-btn" onclick="toggleDarkMode()">Toggle Dark Mode</button>

    <header>
        <h1>Online Canteen Management System</h1>
        <nav>
            <a href="index1.php">Home</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <a href="cart.php">Cart</a>
        </nav>
    </header>

    <div class="hero-section">
        <h2>It's not just food, it's an experience</h2>
        <p>Order the best food, freshly prepared and delivered to your door.</p>
        <div class="buttons">
            <a href="food_list.php">View Menu</a>
            <a href="cart.php">Go To Cart</a>
        </div>
    </div>

    <div class="food-container">
    <h2 style="width: 100%; text-align: center; color: #FFFFFF;">Available Food Items</h2>
    <?php
    $stmt = $pdo->query("SELECT * FROM food_items");
    while ($row = $stmt->fetch()) {
        echo "<a href='food_list.php?id=" . $row['id'] . "' style='text-decoration: none; color: inherit;'>";
        echo "<div class='food-item'>";
        echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
        echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<p>Price: Rs " . htmlspecialchars($row['price']) . "</p>";
        echo "</div>";
        echo "</a>";
    }
    ?>
</div>

    </div>

    <script>
        function toggleDarkMode() {
            const body = document.body;
            const header = document.querySelector('header');
            const heroSection = document.querySelector('.hero-section');
            const foodItems = document.querySelectorAll('.food-item');

            body.classList.toggle('dark-mode');
            header.classList.toggle('dark-mode');
            heroSection.classList.toggle('dark-mode');
            foodItems.forEach(item => item.classList.toggle('dark-mode'));
        }
    </script>
</body>
</html>
