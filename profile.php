<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pic'])) {
    $file = "uploads/".time().$_FILES['pic']['name'];
    move_uploaded_file($_FILES['pic']['tmp_name'], $file);
    $conn->query("UPDATE users SET profile_pic='$file' WHERE id={$_SESSION['user_id']}");
    echo "Profile picture updated!";
}
?>
<form method="post" enctype="multipart/form-data">
  Upload Profile Picture: <input type="file" name="pic" required>
  <button type="submit">Upload</button>
</form>
