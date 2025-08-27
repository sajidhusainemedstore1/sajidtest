<?php
session_start();

$host = "localhost";
$user = "emed";
$pass = "emed";
$db   = "interview_test";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}
?>
