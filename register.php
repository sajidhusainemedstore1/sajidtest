<?php
include 'config.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$pass')";
    if ($conn->query($sql)) {
        $_SESSION['success'] = "Registration Successful. Please Login.";
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
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
        <form method="post">
          Name: <input type="text" name="name" required><br>
          Email: <input type="email" name="email" required><br>
          Password: <input type="password" name="password" required><br>
          <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
