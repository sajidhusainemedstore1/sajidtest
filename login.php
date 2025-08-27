<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['success'] = "login Successful.";
            header("Location: products.php");
            exit;
        } else {
            echo "Invalid Password";
        }
    } else {
        echo "No User Found";
    }
}
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
<style>
</style>
<body>
    <div class=container>
        <form method="post">
          Email: <input type="email" name="email" required><br>
          Password: <input type="password" name="password" required><br>
          <button type="submit">Login</button>
        </form>
        <p style="text-align:center; margin-top:10px;">
        <a href="register.php">Sign Up</a>
    </p>
    </div>
</body>
</html>
