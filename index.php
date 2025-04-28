<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
<h2>Login Form</h2>

<?php
$valid_username="admin";
$valid_password="password123";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);

    if($username===$valid_username && $password===$valid_password){
        echo "<h3>Welcome,".htmlspecialchars($username)."!</h3>";
    }else{
        echo "<p style='color:red;'>Invalid username or password. Please try again.</p>";
    }
}
?>

<form method="POST" action="">
    <label for="username">Username:</label><br>
    <input type="text" name="username" id="username" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <input type="submit" value="Login">
</form>
</body>
</html>