<?php


// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MiniProjectSahya";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate form data
$full_name = $conn->real_escape_string($_POST['full_name']);
$card_name = $conn->real_escape_string($_POST['card_name']);
$email = $conn->real_escape_string($_POST['email']);
$contact_number = $conn->real_escape_string($_POST['contact_number']);
$card_number = $conn->real_escape_string($_POST['card_number']);
$card_cvc = $conn->real_escape_string($_POST['card_cvc']);
$exp_month = $conn->real_escape_string($_POST['exp_month']);
$exp_year = $conn->real_escape_string($_POST['exp_year']);

// Generate a unique registration number
$paymentid = 'ORD' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));
$registration_num=password_hash($paymentid , PASSWORD_DEFAULT);
// Insert data into the database
$sql = "INSERT INTO payments (full_name, card_name, email, contact_number, card_number, card_cvc, exp_month, exp_year, payment_id) 
        VALUES ('$full_name', '$card_name', '$email', '$contact_number', '$card_number', '$card_cvc', '$exp_month', '$exp_year', '$registration_num')";

if ($conn->query($sql) === TRUE) {
    // Redirect to success page with the registration number
    header("Location: payment_success.php?reg_no=$paymentid");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
