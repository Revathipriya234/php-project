<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

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

// Query the employee table
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);

// Check if records found
if ($result->num_rows > 0) {
    $employees = [];

    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }

    http_response_code(200);
    echo json_encode(["employees" => $employees],JSON_PRETTY_PRINT);
} else {
    http_response_code(404);
    echo json_encode(["message" => "No employees found"],JSON_PRETTY_PRINT);
}

$conn->close();
?>