<?php
// SahyaDD_PHP.php
include 'DatabaseConnection.php';

$action = $_POST['action'] ?? '';

switch ($action) {
    case 'get_department_info':
        getDepartmentInfo();
        break;
    case 'get_pending_department_heads':
        getPendingDepartmentHeads();
        break;
    case 'approve_department_head':
        approveDepartmentHead();
        break;
    case 'reject_department_head':
        rejectDepartmentHead();
        break;
    case 'add_department':
        addDepartment();
        break;
    case 'edit_department':
        editDepartment();
        break;
    case 'delete_department':
        deleteDepartment();
        break;    
    case 'get_events':
        getEvents();
        break;
    case 'add_event':
        addEvent();
        break;
    case 'edit_event':
        editEvent();
        break;
    case 'delete_event':
        deleteEvent();
        break;
    case 'get_live_updates':
        getLiveUpdates();
        break;
    case 'update_event_status':
        updateEventStatus();
        break;
    case 'get_registrations':
        getRegistrations();
        break;
    case 'get_payments':
        getPayments();
        break;
    case 'get_reports':
        getReports();
        break;
    case 'get_prize_distribution':
        getPrizeDistribution();
        break;
    case 'update_prize_distribution':
        updatePrizeDistribution();
        break;
    case 'get_departments':
        getDepartments();
        break;
    case 'get_department':
        getDepartment();
        break;
    case 'get_event':
        getEvent();
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}

function getDepartmentInfo() {
    global $conn;
    
    $sql = "SELECT d.department_id, d.department_name, u.user_id, u.full_name, u.email, u.phone_number 
            FROM Departments d
            LEFT JOIN DepartmentHeads dh ON d.department_id = dh.department_id
            LEFT JOIN Users u ON dh.user_id = u.user_id AND u.role = 'departmentHead' AND u.status = 'approved'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $departments = [];
        while ($row = $result->fetch_assoc()) {
            $departments[] = $row;
        }
        echo json_encode($departments);
    } else {
        echo json_encode(['error' => 'Department info not found']);
    }
}

function getPendingDepartmentHeads() {
    global $conn;
    
    $sql = "SELECT u.user_id, u.full_name, u.email, u.phone_number, d.department_id, d.department_name
            FROM Users u
            JOIN DepartmentHeads dh ON u.user_id = dh.user_id
            JOIN Departments d ON dh.department_id = d.department_id
            WHERE u.role = 'departmentHead' AND u.status = 'pending'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $pending_heads = [];
        while ($row = $result->fetch_assoc()) {
            $pending_heads[] = $row;
        }
        echo json_encode($pending_heads);
    } else {
        echo json_encode(['error' => 'No pending department heads found']);
    }
}

function approveDepartmentHead() {
    global $conn;
    
    $user_id = $_POST['user_id'];
    
    $sql = "UPDATE Users SET status = 'approved' WHERE user_id = ? AND role = 'departmentHead'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Department head approved successfully']);
    } else {
        echo json_encode(['error' => 'Failed to approve department head']);
    }
}

function rejectDepartmentHead() {
    global $conn;
    
    $user_id = $_POST['user_id'];
    
    // Start transaction
    $conn->begin_transaction();
    
    try {
        // Delete from DepartmentHeads table
        $sql = "DELETE FROM DepartmentHeads WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        
        // Delete from Users table
        $sql = "DELETE FROM Users WHERE user_id = ? AND role = 'departmentHead'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        
        // Commit transaction
        $conn->commit();
        
        echo json_encode(['success' => true, 'message' => 'Department head rejected and removed successfully']);
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo json_encode(['error' => 'Failed to reject department head: ' . $e->getMessage()]);
    }
}

function addDepartment() {
    global $conn;
    
    $department_name = $_POST['department_name'];
    
    $sql = "INSERT INTO Departments (department_name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $department_name);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Department added successfully']);
    } else {
        echo json_encode(['error' => 'Failed to add department']);
    }
}

function editDepartment() {
    global $conn;
    
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];
    
    $sql = "UPDATE Departments SET department_name = ? WHERE department_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $department_name, $department_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Department updated successfully']);
    } else {
        echo json_encode(['error' => 'Failed to update department']);
    }
}

function deleteDepartment() {
    global $conn;
    
    $department_id = $_POST['department_id'];
    
    // First, delete the department head association
    $sql = "DELETE FROM DepartmentHeads WHERE department_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $department_id);
    $stmt->execute();
    
    // Then, delete the department
    $sql = "DELETE FROM Departments WHERE department_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $department_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Department deleted successfully']);
    } else {
        echo json_encode(['error' => 'Failed to delete department']);
    }
}

function getDepartments() {
    global $conn;
    
    $sql = "SELECT department_id, department_name FROM Departments";
    $result = $conn->query($sql);
    
    $departments = [];
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }
    
    echo json_encode($departments);
}

function getDepartment() {
    global $conn;
    
    $department_id = $_POST['department_id'];
    
    $sql = "SELECT d.*, u.full_name, u.email, u.phone_number 
            FROM Departments d
            LEFT JOIN DepartmentHeads dh ON d.department_id = dh.department_id
            LEFT JOIN Users u ON dh.user_id = u.user_id
            WHERE d.department_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $department_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'Department not found']);
    }
}

function getEvent() {
    global $conn;
    
    $event_id = $_POST['event_id'];
    
    $sql = "SELECT e.*, d.department_name 
            FROM Events e 
            JOIN Departments d ON e.department_id = d.department_id
            WHERE e.event_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'Event not found']);
    }
}

function getEvents() {
    global $conn;
    
    $sql = "SELECT e.*, d.department_name 
            FROM Events e 
            JOIN Departments d ON e.department_id = d.department_id";
    
    $result = $conn->query($sql);
    
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
    
    echo json_encode($events);
}

function addEvent() {
    global $conn;
    
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];
    $event_description = $_POST['event_description'];
    $event_fee = $_POST['event_fee'];
    $department_id = $_POST['department_id'];
    
    $sql = "INSERT INTO Events (event_name, event_date, event_location, event_description, event_fee, department_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdi", $event_name, $event_date, $event_location, $event_description, $event_fee, $department_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Event added successfully']);
    } else {
        echo json_encode(['error' => 'Failed to add event']);
    }
}

function editEvent() {
    global $conn;
    
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];
    $event_description = $_POST['event_description'];
    $event_fee = $_POST['event_fee'];
    $department_id = $_POST['department_id'];
    
    $sql = "UPDATE Events SET event_name = ?, event_date = ?, event_location = ?, event_description = ?, event_fee = ?, department_id = ? WHERE event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdii", $event_name, $event_date, $event_location, $event_description, $event_fee, $department_id, $event_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Event updated successfully']);
    } else {
        echo json_encode(['error' => 'Failed to update event']);
    }
}

function deleteEvent() {
    global $conn;
    
    $event_id = $_POST['event_id'];
    
    $sql = "DELETE FROM Events WHERE event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Event deleted successfully']);
    } else {
        echo json_encode(['error' => 'Failed to delete event']);
    }
}


function getLiveUpdates() {
    global $conn;
    
    $sql = "SELECT e.event_id, e.event_name, e.event_date, e.event_location, 
                   CASE 
                       WHEN e.event_date > CURDATE() THEN 'Upcoming'
                       WHEN e.event_date = CURDATE() THEN 'Live'
                       ELSE 'Ended'
                   END AS status
            FROM Events e";
    
    $result = $conn->query($sql);
    
    $live_updates = [];
    while ($row = $result->fetch_assoc()) {
        $live_updates[] = $row;
    }
    
    echo json_encode($live_updates);
}

function updateEventStatus() {
    global $conn;
    
    $event_id = $_POST['event_id'] ?? 0;
    $new_status = $_POST['new_status'] ?? '';
    
    if ($event_id && $new_status) {
        $sql = "UPDATE Events SET status = ? WHERE event_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $new_status, $event_id);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Failed to update event status']);
        }
    } else {
        echo json_encode(['error' => 'Invalid input']);
    }
}

function getRegistrations() {
    global $conn;
    
    $sql = "SELECT * FROM registrations";
    
    $result = $conn->query($sql);
    
    $registrations = [];
    while ($row = $result->fetch_assoc()) {
        $registrations[] = $row;
    }
    
    echo json_encode($registrations);
}

function getPayments() {
    global $conn;
    
    $sql = "SELECT p.*, r.registration_number 
            FROM payments p 
            JOIN registrations r ON p.registration_id = r.registration_id";
    
    $result = $conn->query($sql);
    
    $payments = [];
    while ($row = $result->fetch_assoc()) {
        $payments[] = $row;
    }
    
    echo json_encode($payments);
}

function getReports() {
    global $conn;
    
    $sql = "SELECT 
                COUNT(DISTINCT d.department_id) as total_departments,
                COUNT(DISTINCT e.event_id) as total_events,
                COUNT(DISTINCT r.registration_id) as total_participants,
                COALESCE(SUM(p.amount), 0) as total_revenue
            FROM Departments d
            LEFT JOIN Events e ON d.department_id = e.department_id
            LEFT JOIN registrations r ON e.event_name = r.event
            LEFT JOIN payments p ON r.registration_id = p.registration_id";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'Failed to get department stats']);
    }
}

function getPrizeDistribution() {
    global $conn;
    
    $sql = "SELECT e.event_id, e.event_name, d.department_name, 
                   pd.position, pd.winner_name, pd.prize_amount, pd.distribution_status
            FROM Events e
            JOIN Departments d ON e.department_id = d.department_id
            LEFT JOIN PrizeDistribution pd ON e.event_id = pd.event_id
            ORDER BY e.event_id, pd.position";
    
    $result = $conn->query($sql);
    
    $prize_distribution = [];
    while ($row = $result->fetch_assoc()) {
        $prize_distribution[] = $row;
    }
    
    echo json_encode($prize_distribution);
}

function updatePrizeDistribution() {
    global $conn;
    
    $event_id = $_POST['event_id'] ?? 0;
    $position = $_POST['position'] ?? 0;
    $winner_name = $_POST['winner_name'] ?? '';
    $prize_amount = $_POST['prize_amount'] ?? 0;
    $distribution_status = $_POST['distribution_status'] ?? 'Pending';
    
    if ($event_id && $position) {
        $sql = "INSERT INTO PrizeDistribution (event_id, position, winner_name, prize_amount, distribution_status) 
                VALUES (?, ?, ?, ?, ?) 
                ON DUPLICATE KEY UPDATE 
                winner_name = VALUES(winner_name), 
                prize_amount = VALUES(prize_amount),
                distribution_status = VALUES(distribution_status)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisds", $event_id, $position, $winner_name, $prize_amount, $distribution_status);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Failed to update prize distribution']);
        }
    } else {
        echo json_encode(['error' => 'Invalid input']);
    }
}
?>