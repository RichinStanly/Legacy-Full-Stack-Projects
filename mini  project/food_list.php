<?php
session_start();
include('db.php');

$stmt = $pdo->query("SELECT * FROM food_items");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food List</title>
    <style>
        :root {
            --bg-color-light: rgba(255, 255, 255, 0.8);
            --text-color-light: #333;
            --bg-color-dark: rgba(0, 0, 0, 0.8);
            --text-color-dark: #f9f9f9;
            --card-bg-light: #ffffff;
            --card-bg-dark: #333333;
            --accent-color: #ff9800;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('background-light.jpg') no-repeat center center fixed;
            background-size: cover;
            color: var(--text-color-light);
            transition: background-color 0.3s, color 0.3s, background 0.3s;
        }

        .dark-mode {
            background: url('background-dark.jpg') no-repeat center center fixed;
            background-size: cover;
            --bg-color-light: var(--bg-color-dark);
            --text-color-light: var(--text-color-dark);
            --card-bg-light: var(--card-bg-dark);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: var(--bg-color-light);
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: var(--accent-color);
        }

        .food-item {
            background-color: var(--card-bg-light);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .food-item:hover {
            transform: scale(1.05);
        }

        .food-item img {
            max-width: 150px;
            border-radius: 8px;
        }

        .food-item h2 {
            margin: 10px 0;
        }

        .food-item p {
            margin: 5px 0;
        }

        .food-item button {
            background-color: var(--accent-color);
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .food-item button:hover {
            background-color: darkorange;
        }
        .food-item .buy-now-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .food-item .buy-now-btn:hover {
            background-color: #45a049;

        .dark-mode-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--accent-color);
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        a {
            text-decoration: none;
            color: var(--accent-color);
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Food Items</h1>
        <?php while ($row = $stmt->fetch()) : ?>
            <div class="food-item">
                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="Food Image">
                <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <p>Price: Rs<?php echo htmlspecialchars($row['price']); ?></p>
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="food_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                    <input type="hidden" name="food_name" value="<?php echo htmlspecialchars($row['name']); ?>">
                    <input type="hidden" name="food_price" value="<?php echo htmlspecialchars($row['price']); ?>">
                    <button type="submit">Add to Cart</button>
                </form>
            
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="food_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                    <input type="hidden" name="food_name" value="<?php echo htmlspecialchars($row['name']); ?>">
                    <input type="hidden" name="food_price" value="<?php echo htmlspecialchars($row['price']); ?>">
                    <input type="hidden" name="buy_now" value="true">
                    <button type="submit" class="buy-now-btn">Buy Now</button>
                </form>
            </div>
        <?php endwhile; ?>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="cart.php">View Cart</a>
        </div>
    </div>
    
    <button class="dark-mode-toggle" onclick="toggleDarkMode()">Toggle Dark Mode</button>
    
    <script>
        const toggleDarkMode = () => {
            document.body.classList.toggle('dark-mode');
            const isDarkMode = document.body.classList.contains('dark-mode');
            localStorage.setItem('darkMode', isDarkMode);
        };

        window.onload = () => {
            if (localStorage.getItem('darkMode') === 'true') {
                document.body.classList.add('dark-mode');
            }
        };
    </script>
</body>
</html>
