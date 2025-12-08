<?php
require_once "connect.php"; // Your DB connection file

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get JSON input
    $input = json_decode(file_get_contents('php://input'), true);
    
    // --- Data Retrieval ---
    // We will primarily need a unique identifier (like email or Id) 
    // and the password for confirmation.
    
    // Handle both JSON and form data
    // if ($input) {
    //     $identifier = trim($input['id'] ?? $input['email'] ?? '');
    //     //$password = trim($input['password'] ?? '');
    // } else {
        $identifier = trim($_POST['email'] ?? '');
        //$password = trim($_POST['password'] ?? '');
    //}
    
    // Validate input: Check if we received an identifier
    if (empty($identifier)) {
        echo json_encode(['status' => 'error', 'message' => 'User Email is required']);
        exit;
    }

    // // --- User Verification ---
    // // Prepare the statement to fetch the user's hashed password and ID
    // $checkStmt = $conn->prepare("SELECT id, password FROM users WHERE email = ? OR id = ?");
    
    // // Determine if the identifier is likely an email (string) or an ID (integer)
    // if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
    //     $idParam = null; // Use NULL for the ID placeholder if checking by email
    //     $emailParam = $identifier;
    //     $checkStmt->bind_param("ss", $emailParam, $idParam); // Still binds two strings
    // } elseif (is_numeric($identifier)) {
    //     $idParam = (int)$identifier;
    //     $emailParam = null; // Use NULL for the email placeholder if checking by ID
    //     $checkStmt->bind_param("ss", $emailParam, $idParam);
    // } else {
    //     echo json_encode(['status' => 'error', 'message' => 'Invalid identifier format']);
    //     $checkStmt->close();
    //     exit;
    // }

    // $checkStmt->execute();
    // $checkResult = $checkStmt->get_result();
    // $user = $checkResult->fetch_assoc();
    // $checkStmt->close();

    // // 1. Check if user exists
    // if (!$user) {
    //     echo json_encode(['status' => 'error', 'message' => 'Account not found']);
    //     $conn->close();
    //     exit;
    // }
    
    // // 2. Check if password is provided (required for deletion)
    // if (empty($password)) {
    //     echo json_encode(['status' => 'error', 'message' => 'Password is required to confirm deletion']);
    //     $conn->close();
    //     exit;
    // }

    // // 3. Verify the password
    // if (!password_verify($password, $user['password'])) {
    //     echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
    //     $conn->close();
    //     exit;
    // }

    // --- Account Deletion ---
    $deleteStmt = $conn->prepare("DELETE FROM users WHERE email = ?");
    $deleteStmt->bind_param("s", $identifier);
    
    if ($deleteStmt->execute()) {
        if ($deleteStmt->affected_rows > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Account successfully deleted']);
        } else {
            // This case should be rare since we already verified the user exists
            echo json_encode(['status' => 'error', 'message' => 'Deletion failed: User not found during delete operation']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Deletion failed: ' . $conn->error]);
    }

    $deleteStmt->close();
    $conn->close();

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method. Use POST.']);
}
?>