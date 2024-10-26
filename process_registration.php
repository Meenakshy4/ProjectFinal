<?php
session_start();

include "sahyaconnection.php";

// Sanitize and fetch form data
$event_type = $_POST['event_type'];
$department = $_POST['department'];
$event = $_POST['event'];
$event_date = $_POST['event_date'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$college_name = $_POST['college_name'];
$place = $_POST['place'];
$participants_names = $_POST['participants_names'];

// Generate unique registration number
$registration_number = strtoupper(substr($department, 0, 3)) . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

// Insert data into registrations table
$sql = "INSERT INTO registrations (registration_number, event_type, department, event, event_date, contact_number, email, college_name, place) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $registration_number, $event_type, $department, $event, $event_date, $contact_number, $email, $college_name, $place);

if ($stmt->execute()) {
    $registration_id = $stmt->insert_id;

    // Insert data into participants table
    $participant_sql = "INSERT INTO participants (registration_id, participant_name) VALUES (?, ?)";
    $participant_stmt = $conn->prepare($participant_sql);

    foreach ($participants_names as $name) {
        $participant_stmt->bind_param("is", $registration_id, $name);
        $participant_stmt->execute();
    }

    echo "Success! Registration Number: $registration_number";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
