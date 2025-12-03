<?php
// register.php
session_start();
require_once 'connect.php';

// Safety check: ensure $conn is defined
if (!isset($conn) || $conn === null) {
    die("Database connection not established.");
}

if (isset($_POST['signup'])) {
    $firstName = trim($_POST['fName'] ?? '');
    $lastName  = trim($_POST['lName'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $password  = $_POST['password'] ?? '';

    // Basic validation
    if ($firstName === '' || $lastName === '' || $email === '' || $password === '') {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if (strlen($password) < 8) {
        die("Password must be at least 8 characters.");
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        $conn->close();
        die("Email address already exists!");
    }
    $stmt->close();

    // Hash password and insert user
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insert = $conn->prepare("INSERT INTO users (fName, lName, email, password) VALUES (?, ?, ?, ?)");
    if (!$insert) {
        die("Prepare failed: " . $conn->error);
    }

    $insert->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

    if ($insert->execute()) {
        $insert->close();
        $conn->close();
        header("Location: index.php");
        exit();
    } else {
        $insert->close();
        $conn->close();
        die("Error: " . $insert->error);
    }
} else {
    header("Location: index.php");
    exit();
}

