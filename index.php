<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Form</h2>

    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=trim($_POST['name']);
        $email=trim($_POST['email']);
        $message=trim($_POST['message']);
        
        if(empty($name)||empty($email)||empty($message)){
            echo "<p style='color:red;>' All fieds are Required!</p>";
        }else{
            echo "<h2>Form Submitted Successfully:</h2>";
            echo "<p><strong>Name:</strong>".htmlspecialchars($name)."</p>";
            echo "<p><strong>Email:</strong>".htmlspecialchars($email)."</p>";
            echo "<p><strong>Message:</strong>".htmlspecialchars($message)."</p>";
        }
    }
    ?>

    <!-- Form Html -->
     <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name"><br><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" id="emai"><br><br>

        <label for="message">Message:</label><br>
        <textarea name="message" id="message" rows="5"></textarea><br><br>

        <input type="submit" value="Submit">
     </form>
</body>
</html>