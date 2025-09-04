<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #333;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #555;
        }

        .success {
            color: #28a745;
            font-weight: bold;
        }

        .error {
            color: #dc3545;
            font-weight: bold;
        }

        a.btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }

        a.btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            include 'config.php';
            if (!isset($_SESSION['user_id'])) { 
                header("Location: login.php"); 
                exit; 
            }

            if (!empty($_SESSION['cart'])) {
                foreach($_SESSION['cart'] as $pid){
                    $sql = "INSERT INTO orders (user_id,product_id,quantity) 
                            VALUES ('{$_SESSION['user_id']}','$pid',1)";
                    $conn->query($sql);
                }
                $_SESSION['cart'] = [];
                echo "<h1 class='success'>✅ Order Placed Successfully!</h1>";
                echo "<p>Thank you for shopping with us.</p>";
                echo "<a href='products.php' class='btn'>Continue Shopping</a>";
            } else {
                echo "<h1 class='error'>⚠️ Cart is empty</h1>";
                echo "<a href='products.php' class='btn'>Browse Products</a>";
            }
        ?>
    </div>
</body>
</html>
