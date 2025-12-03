<?php
session_start();
require_once 'connect.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Please enter your email and password.";
    } else {
        $sql = "SELECT Id, fName, lName, email, password FROM users WHERE email = ?";

        if ($stmt = $conn->prepare($sql)) {

            $stmt->bind_param("s", $email);

            if ($stmt->execute()) {

                $stmt->store_result();

                if ($stmt->num_rows == 1) {

                    $stmt->bind_result($id, $fName, $lName, $emailDB, $hashed_password);
                    $stmt->fetch();

                    if (password_verify($password, $hashed_password)) {

                        // store session
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["fName"] = $fName;
                        $_SESSION["lName"] = $lName;
                        $_SESSION["email"] = $emailDB;

                        header("Location: index.html");
                        exit();
                    } else {
                        $error = "Invalid email or password.";
                    }
                } else {
                    $error = "Invalid email or password.";
                }

            } else {
                $error = "Database error.";
            }

            $stmt->close();
        }
    }

    $conn->close();
}
?>
