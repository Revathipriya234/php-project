<!DOCTYPE html>
<html>
<head>
    <title>Password Strength Checker</title>
</head>
<body>

<?php
$password = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $errors = [];

    // Check for length
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    // Check for a number
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must include at least one number.";
    }

    // Check for uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password must include at least one uppercase letter.";
    }

    // Check for lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        $errors[] = "Password must include at least one lowercase letter.";
    }

    // Display results
    if (empty($errors)) {
        $message = "<p style='color:green;'>Strong password!</p>";
    } else {
        $message = "<p style='color:red;'>Weak password:</p><ul>";
        foreach ($errors as $error) {
            $message .= "<li>$error</li>";
        }
        $message .= "</ul>";
    }
}
?>

<h2>Enter a password</h2>
<form method="POST" action="">
    <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required>
    <button type="submit">Check Strength</button>
</form>

<?php
echo $message;
?>

</body>
</html>
