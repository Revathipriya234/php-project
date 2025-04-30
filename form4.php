<?php
$host='localhost';
$db='test_db';
$users='root';
$pass='';

try{
    //connect to the database
    $pdo=new PDO("mysql:host=$host; dbname=$db",$users,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>Connected to database successfully.</p>";

    //step1:create table
    $pdo->exec("DROP TABLE IF EXEISTS users");//optional:Reset table if it already exists
    $createTableSQL="
        CREATE TABLE users(
            Id INT AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(30),
            Email VARCHAR(50),
            Age INT
        )
    ";
    $pdo->exec($createTableSQL);
    echo "<p>Table 'users' created";

    //step2:insert 4 rows
    $insertSQL="INSERT INTO users(Name,Email,Age) value(?,?,?)";
    $stmt=$Pdo->prepare($insertSQL);
    $users=[
        ['Ram','ram@gmail.com',28],
        ['Kumar','kumar@gmail.com',35],
        ['Raj','raj@gmail.com',22],
        ['Krishna','krishna@gmail.com',30]
    ];
    foreach($users as $user){
        $stmt->execute($user);
    }
    echo "<p>4 rows inserted successfully.</p>";

    //step3:select and display data
    $stmt=$pdo->query("SELECT*FROM users");
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3>users table:</h3><table border='1' cellpadding='8'><tr><th>Id</th><th>Name</th><th<Email</th><th>Age</th></tr>";

    foreach($rows as $row){
        echo "<tr>
                 <td>{$row['Id']}<td>
                 <td>{$row['Name']}</td>
                 <td>{$row['Email']}</td>
                 <td>{$row['Age']}</td>
            </tr>";
    }
    echo "</table>";
}
catch(PDOException $e){
    echo "Error:".$e->getMessage();
}
?>