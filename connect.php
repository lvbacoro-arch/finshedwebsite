<?php
// connect.php
$host = "localhost";
$user = "root";
$pass = "";         // set your XAMPP password if any
$db   = "bytehardware"; // change to your DB name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
