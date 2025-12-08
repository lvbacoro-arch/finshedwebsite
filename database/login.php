<?php
session_start();
require_once "connect.php";

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get JSON input
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Handle both JSON and form data
    if ($input) {
        $email = trim($input['email'] ?? '');
        $password = trim($input['password'] ?? '');
    } else {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
    }

    // Validate input
    if (empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }

    $stmt = $conn->prepare("SELECT id, fName, lName, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['userId'] = $row['id'];
            $_SESSION['fName'] = $row['fName'];
            $_SESSION['lName'] = $row['lName'];
            $_SESSION['email'] = $email;
            
            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful',
                'user' => [
                    'id' => $row['id'],
                    'name' => $row['fName'] . ' ' . $row['lName'],
                    'email' => $email
                ]
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
        }

    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email not found']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>

