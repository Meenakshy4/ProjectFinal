<?php
session_start();
include 'DatabaseConnection.php';

ob_start();
$response = ['success' => false, 'message' => '', 'redirect' => ''];
error_log("Login script started");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        $response['message'] = 'Missing username or password.';
        error_log($response['message']);
        ob_end_clean();
        echo json_encode($response);
        exit();
    }

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    error_log("Received username: $username, password: $password");

    $stmt = $conn->prepare("SELECT user_id, password, role, status FROM users WHERE username = ?");

    if (!$stmt) {
        $response['message'] = 'Database query error: ' . $conn->error;
        error_log($response['message']);
        ob_end_clean();
        echo json_encode($response);
        exit();
    }
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password, $role, $status);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            if ($status === 'approved') {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                session_regenerate_id(true);
                $response['success'] = true;
                $response['message'] = 'Login successful.';
                
                // Set redirect based on role
                if ($role === 'admin') {
                    $response['redirect'] = 'AdminDashboard.php';
                } elseif ($role === 'departmentHead') {
                    $response['redirect'] = 'DepartmentDashboardNew.php';
                } else {
                    $response['redirect'] = 'Homepage.php';
                }
            } else {
                $response['message'] = 'Your account is pending approval. Please check back later.';
                error_log("Login attempt by pending user: $username");
            }
        } else {
            $response['message'] = 'Invalid password.';
            error_log($response['message']);
        }
    } else {
        $response['message'] = 'Invalid username.';
        error_log($response['message']);
    }

    $stmt->close();
    $conn->close();
} else {
    $response['message'] = 'Invalid request method.';
    error_log($response['message']);
}

ob_end_clean();
header('Content-Type: application/json');
echo json_encode($response);
?>