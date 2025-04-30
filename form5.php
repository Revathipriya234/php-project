<!DOCTYPE html>
<html>
<head>
    <title>Email Vlidation</title>
</head>
<body>

<?php
$email="";
$message="";

if($_SERVEER["REQUEST_METHOD"]=="POST"){
    $email=$_POST("email");

    if(filter_var("email, FILTER_VALIDATE_EMAIL")){
        $message="<p style='color:green;'>Email is valid!</p>";
    }else{
        $message="<p style='color:red;'>Invalid email format.</p>";
    }
}
?>

<h2>Enter your email address</h2>
<form method="POST" action="">
    <input type="email" name="email" value="<?php echo htmlspecialchars($email);?>"required>
    <button type="submit">Vlidate</button>
</form>

<?php
echo $message;
?>
</body>
</html>