<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

$limit = 3; 
$page  = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page-1)*$limit;

$result = $conn->query("SELECT * FROM products LIMIT $start,$limit");
?>
<?php
session_start();
if (isset($_SESSION['success'])) {
    echo "<p style='color:green;'>".$_SESSION['success']."</p>";
    unset($_SESSION['success']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Products</h2>
        <a href="cart.php">Go to Cart</a> | <a href="profile.php">Profile</a> | <a href="logout.php">Logout</a>
        <table border="1">
        <tr><th>Name</th><th>Price</th><th>Action</th></tr>
        <?php while($row=$result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['name'] ?></td>
          <td><?= $row['price'] ?></td>
          <td><a href="cart.php?add=<?= $row['id'] ?>">Add to Cart</a></td>
        </tr>
        <?php endwhile; ?>
        </table>

    </div>
</body>
</html>