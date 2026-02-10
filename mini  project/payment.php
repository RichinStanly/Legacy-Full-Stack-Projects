<?php 
session_start(); 
include('db.php'); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff9800;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 2em;
        }

        .container {
            width: 100%;
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.6em;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #ff9800;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #ff9800;
            color: white;
            font-size: 1.2em;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e68900;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #ff9800;
            text-decoration: none;
            font-size: 1.1em;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 0.9em;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<header>Payment</header>

<div class="container">
    <h2>Enter Payment Details</h2>
    <form action="payment_process.php" method="POST" id="payment-form">
        <div class="form-group">
            <input type="text" name="card_number" id="card_number" placeholder="Card Number (16 digits)" required maxlength="16" pattern="\d{16}" title="Please enter a valid 16-digit card number" oninput="validateCardNumber()" />
        </div>
        <div class="form-group">
            <input type="text" name="expiry_date" id="expiry_date" placeholder="Expiry Date (MM/YY)" required maxlength="5" pattern="^(0[1-9]|1[0-2])\/\d{2}$" title="Please enter a valid expiry date (MM/YY)" oninput="validateExpiryDate()" />
        </div>
        <div class="form-group">
            <input type="text" name="cvv" id="cvv" placeholder="CVV (3 digits)" required maxlength="3" pattern="\d{3}" title="Please enter a valid 3-digit CVV" oninput="validateCVV()" />
        </div>
        <button type="submit">Pay Now</button>
    </form>

    <div class="back-link">
        <a href="index1.php">Back to Home</a>
    </div>
    
    <div class="error" id="error-message" style="display: none;">Please fill out the form correctly.</div>
</div>

<script>
    function validateCardNumber() {
        const cardNumber = document.getElementById('card_number').value;
        if (!/^\d{16}$/.test(cardNumber)) {
            document.getElementById('error-message').style.display = 'block';
        } else {
            document.getElementById('error-message').style.display = 'none';
        }
    }

    function validateExpiryDate() {
        const expiryDate = document.getElementById('expiry_date').value;
        if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expiryDate)) {
            document.getElementById('error-message').style.display = 'block';
        } else {
            document.getElementById('error-message').style.display = 'none';
        }
    }

    function validateCVV() {
        const cvv = document.getElementById('cvv').value;
        if (!/^\d{3}$/.test(cvv)) {
            document.getElementById('error-message').style.display = 'block';
        } else {
            document.getElementById('error-message').style.display = 'none';
        }
    }

    document.getElementById('payment-form').onsubmit = function(event) {
        if (!/^\d{16}$/.test(document.getElementById('card_number').value) ||
            !/^(0[1-9]|1[0-2])\/\d{2}$/.test(document.getElementById('expiry_date').value) ||
            !/^\d{3}$/.test(document.getElementById('cvv').value)) {
            event.preventDefault();
            document.getElementById('error-message').style.display = 'block';
        }
    };
</script>

</body>
</html>
