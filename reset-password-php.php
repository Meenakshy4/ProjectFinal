<?php
include 'DatabaseConnection.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['username']) || !isset($_POST['newPassword'])) {
        $response['message'] = 'Missing username or new password.';
        echo json_encode($response);
        exit();
    }

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $newPassword = $_POST['newPassword'];

    // Check if the username exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username exists, proceed with password update
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
        $updateStmt->bind_param("ss", $hashedPassword, $username);
        
        if ($updateStmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Password reset successful. You can now login with your new password.';
        } else {
            $response['message'] = 'An error occurred while resetting the password.';
        }
        
        $updateStmt->close();
    } else {
        $response['message'] = 'Username not found.';
    }

    $stmt->close();
    $conn->close();
} else {
    $response['message'] = 'Invalid request method.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
