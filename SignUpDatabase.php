<?php
session_start();
include 'DatabaseConnection.php';

$response = ['success' => false, 'message' => '', 'usernameError' => '', 'passwordError' => ''];

// Helper function for validating phone number
function validatePhoneNumber($phone_number) {
    return preg_match('/^\d{10,15}$/', $phone_number);
}

// Validate input fields
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $role = $_POST['role'];
    $department = isset($_POST['department']) ? $_POST['department'] : null;

    // Validation
    if (empty($full_name) || empty($username) || empty($password) || empty($confirm_password) || empty($email) || empty($phone_number) || empty($role)) {
        $response['message'] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        $response['passwordError'] = "Passwords do not match.";
    } elseif (!validatePhoneNumber($phone_number)) {
        $response['message'] = "Invalid phone number format.";
    } else {
        // Check if username already exists
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $response['usernameError'] = "Username already exists.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare SQL query
            $sql = "INSERT INTO users (full_name, username, email, password, phone_number, role, department) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $full_name, $username, $email,$password, $phone_number, $role, $department);

            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = "Signup successful. Please log in.";
            } else {
                $response['message'] = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    $conn->close();
    echo json_encode($response);
}
?>
