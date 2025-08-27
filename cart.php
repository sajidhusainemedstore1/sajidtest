<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <?php
    include 'config.php';
    session_start();
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    if (isset($_GET['add'])) {
        $_SESSION['cart'][] = (int)$_GET['add'];
    }

    echo "<h2>Shopping Cart</h2>";

    if (empty($_SESSION['cart'])) {
        echo "<p class='error'>Your cart is empty</p>";
    } else {
        $total = 0;
        echo "<table>";
        echo "<tr><th>Product</th><th>Price</th></tr>";
        foreach($_SESSION['cart'] as $pid){
            $res = $conn->query("SELECT * FROM products WHERE id=$pid");
            if ($res && $p = $res->fetch_assoc()) {
                echo "<tr>
                        <td>{$p['name']}</td>
                        <td>₹{$p['price']}</td>
                      </tr>";
                $total += $p['price'];
            }
        }
        echo "<tr><th>Total</th><th>₹$total</th></tr>";
        echo "</table>";
        echo "<div style='text-align:center; margin-top:20px;'>
                <a href='checkout.php' class='button'>Proceed to Checkout</a>
              </div>";
    }
    ?>
</div>
</body>
</html>
