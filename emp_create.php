<?php
//Database connection parameters
$host="localhost";
$db_name="test_db";
$username="root";
$password="";

//connect to the database
$conn=new mysqli($host,$username,$password,$db_name);

if($conn->connect_error){
    http_response_code(500);
    echo json_encode(["error"=>"Database connection failed:".$conn->connect_error]);
    exit();
}


//Validate input
if(
    !isset($data['name']) ||
    !isset($data['email']) ||
    !isset($data['position']) ||
    !isset($data['salary'])
){
    http_response_code(400);
    echo json_encode(["error"=>"Missing required fields"]);
    exit();
}
if (!$data) {
    echo json_encode(["error" => "Invalid JSON or no data received", "raw" => file_get_contents("php://input")]);
    exit();
}
$name=$conn->real_escape_string($data['name']);
$email=$conn->real_escape_string($data['email']);
$position=$conn->real_escape_string($data['position']);
$salary=(float)$data['salary'];

//Insert query
$sql="INSERT INTO employee(name,email,position,salary) VALUES ('$name','$email','$position',$salary)";
if($conn->query($sql)===TRUE){
    http_response_code(201);
    echo json_encode(["message"=>"Employee created Successfully","employee_id"=>$conn->insert_id]);
}else{
    http_response_code(500);
    echo json_encode(["error"=>"Error creating employee:".$conn->error]);
}

$conn->close();
?>