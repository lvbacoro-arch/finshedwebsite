<?php
session_start();
require_once 'connect.php';

if (!isset($conn)) {
    die("Database connection not established.");
}

if (isset($_POST['signup'])) {

    $firstName = trim($_POST['fName']);
    $lastName  = trim($_POST['lName']);
    $email     = trim($_POST['email']);
    $password  = $_POST['password'];

    // Validation
    if ($firstName === '' || $lastName === '' || $email === '' || $password === '') {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if (strlen($password) < 8) {
        die("Password must be at least 8 characters.");
    }

    // Check if email exists
    $stmt = $conn->prepare("SELECT Id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Email already exists!");
    }

    $stmt->close();

    // Hash + insert
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insert = $conn->prepare("INSERT INTO users (fName, lName, email, password) VALUES (?, ?, ?, ?)");
    $insert->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

    if ($insert->execute()) {
        header("Location: index.php"); // redirect to login
        exit();
    } else {
        die("Error: " . $insert->error);
    }
}
?>
