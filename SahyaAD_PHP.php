<?php
// db_operations.php

include 'DatabaseConnection.php';

function getData($table) {
    global $conn;
    $result = $conn->query("SELECT * FROM $table");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addRecord($table, $data) {
    global $conn;
    parse_str($data, $parsed_data);
    $columns = implode(", ", array_keys($parsed_data));
    $values = "'" . implode("', '", array_values($parsed_data)) . "'";
    $sql = "INSERT INTO $table ($columns) VALUES ($values)";
    return $conn->query($sql);
}

function updateRecord($table, $id, $data) {
    global $conn;
    parse_str($data, $parsed_data);
    $set = [];
    foreach ($parsed_data as $key => $value) {
        $set[] = "$key = '$value'";
    }
    $set = implode(", ", $set);
    $sql = "UPDATE $table SET $set WHERE {$table}_id = $id";
    return $conn->query($sql);
}

function deleteRecord($table, $id) {
    global $conn;
    $sql = "DELETE FROM $table WHERE {$table}_id = $id";
    return $conn->query($sql);
}

function getDashboardStats() {
    global $conn;
    $stats = [];
    $stats['total_departments'] = $conn->query("SELECT COUNT(*) FROM Departments")->fetch_row()[0];
    $stats['total_events'] = $conn->query("SELECT COUNT(*) FROM Events")->fetch_row()[0];
    $stats['total_registrations'] = $conn->query("SELECT COUNT(*) FROM registrations")->fetch_row()[0];
    $stats['total_payments'] = $conn->query("SELECT COUNT(*) FROM payments")->fetch_row()[0];
    return $stats;
}

function getTableFields($table) {
    global $conn;
    $result = $conn->query("DESCRIBE $table");
    $fields = [];
    while ($row = $result->fetch_assoc()) {
        $fields[] = $row['Field'];
    }
    return $fields;
}

function getRecord($table, $id) {
    global $conn;
    $result = $conn->query("SELECT * FROM $table WHERE {$table}_id = $id");
    return $result->fetch_assoc();
}

// Handle AJAX requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $table = isset($_POST['table']) ? $_POST['table'] : '';
    
    switch ($action) {
        case 'get':
            echo json_encode(getData($table));
            break;
        case 'add':
            echo json_encode(addRecord($table, $_POST['data']));
            break;
        case 'update':
            echo json_encode(updateRecord($table, $_POST['id'], $_POST['data']));
            break;
        case 'delete':
            echo json_encode(deleteRecord($table, $_POST['id']));
            break;
        case 'dashboard_stats':
            echo json_encode(getDashboardStats());
            break;
        case 'get_fields':
            echo json_encode(getTableFields($table));
            break;
        case 'get_record':
            echo json_encode(getRecord($table, $_POST['id']));
            break;
    }
}
?>