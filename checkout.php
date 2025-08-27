<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'config.php';
        if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

        if (!empty($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $pid){
                $sql = "INSERT INTO orders (user_id,product_id,quantity) VALUES ('{$_SESSION['user_id']}','$pid',1)";
                $conn->query($sql);
            }
            $_SESSION['cart'] = [];
            echo "Order Placed Successfully! <a href='products.php'>Continue Shopping</a>";
        } else {
            echo "Cart is empty";
        }
    ?>
</body>
</html>
