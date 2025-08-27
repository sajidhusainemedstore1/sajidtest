<?php
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['email']);

$_SESSION['success'] = "You have been logged out successfully.";

header("Location: login.php");
exit;
