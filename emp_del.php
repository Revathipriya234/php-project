<?php
// Database connection parameters
$host = "localhost";
$db_name = "test_db";
$username = "root";
$password = "";

// Connect to the database
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit();
}


// Use 'id' from DELETE body or query string
$employee_id = isset($input['id']) ? intval($input['id']) : (isset($_GET['id']) ? intval($_GET['id']) : 0);

if ($employee_id <= 0) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid or missing employee ID"]);
    exit();
}

// Delete query
$sql = "DELETE FROM employee WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        http_response_code(200);
        echo json_encode(["message" => "Employee deleted successfully"]);
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Employee not found"]);
    }
} else {
    http_response_code(500);
    echo json_encode(["error" => "Failed to delete employee"]);
}

$stmt->close();
$conn->close();
?>