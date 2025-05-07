<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");

//Database connection parameters
$host="localhost";
$db_name="test_db";
$username="root";
$password="";

//connect to the datbase
$conn=new mysqli($host,$username,$password,$db_name);

//check connection
if($conn->connect_error){
    http_response_code(500);
    echo json_encode(["error"=>"Databse connection failed:".$conn->connect_error]);
    exit();
}

//Get employee_id from query string, if provided
$employee_id=isset($_GET['employee_id'])?intval($_GET['employee_id']):null;

//Build the query based on weather employee_id is set
if($employee_id){
    $sql="SELECT*FROM employee WHERE id=$employee_id";
}else{
    $sql="SELECT*FROM employee";
}

$result=$conn->query($sql);

//check if records found
if($result && $result->num_rows>0){
    $employees=[];

    while($row=$result->fetch_assoc()){
        $employees[]=$row;
    }

    http_response_code(200);
    echo json_encode(["employees"=>$employees],JSON_PRETTY_PRINT);
}else{
    http_response_code(404);
    echo json_encode(["message"=>"No employees found"],JSON_PRETTY_PRINT);
}

$conn->close();
?>