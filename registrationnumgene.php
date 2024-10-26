<?php
session_start();
include "sahyaconnection.php";

$event_type = $_POST['event_type'];
$participants_names = $_SESSION['participantname'] = $_POST['participants_names']; // Array of names
$department = $_POST['department'];
$event = $_POST['event'];
$event_date = $_POST['event_date'];
$contact_number =$_SESSION['participantphnnum'] = $_POST['contact_number'];
$email = $_SESSION['participantemail'] =$_POST['email'];
$college_name = $_POST['college_name'];
$place = $_POST['place'];

// Generate registration number (modify as needed for complexity)
$registration_number = strtoupper($department[0] . $department[1] . $department[2]) . sprintf('%04d', time());

try {
    // Start database transaction
    $conn->begin_transaction();

    // Insert into registrations table
    $stmt = $conn->prepare("INSERT INTO registrations (registration_number, event_type, department, event, event_date, contact_number, email, college_name, place) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $registration_number, $event_type, $department, $event, $event_date, $contact_number, $email, $college_name, $place);
    $stmt->execute();

    $registration_id = $stmt->insert_id;

    // Insert participants into participants table
    $stmt_participant = $conn->prepare("INSERT INTO participants (registration_id, participant_name) VALUES (?, ?)");
    foreach ($participants_names as $name) {
        $stmt_participant->bind_param("is", $registration_id, $name);
        $stmt_participant->execute();
    }
    $stmt_participant->close();

    // Commit the transaction
    $conn->commit();

    echo "New record created successfully!";

    // Redirect to registration number page (regisnum.php)
    header("Location: regisnum.php?registration_number=$registration_number");

} catch(PDOException $e) {
    // Rollback the transaction if any errors occur
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
