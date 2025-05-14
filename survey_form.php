<!DOCTYPE html>
<html>
<head>
    <title>Survey Form</title>
</head>
<body>

<h2>Simple Survey Form</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting data from the form
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']);
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
    $feedback = htmlspecialchars($_POST['feedback']);

    echo "<h3>Survey Results:</h3>";
    echo "Name: $name<br>";
    echo "Age: $age<br>";
    echo "Gender: $gender<br>";
    echo "Hobbies: " . implode(",", $hobbies) . "<br>";
    echo "Feedback: $feedback<br><br>";
}else{
?>

<form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br><br>

    <label for="age">Age:</label>
    <input type="number" name="age" required><br><br>

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male" required> Male<br>
    <input type="radio" name="gender" value="Female" required> Female<br>
    <input type="radio" name="gender" value="Other" required> Other<br><br>

    <label>Hobbies:</label><br>
    <input type="checkbox" name="hobbies[]" value="Reading"> Reading<br>
    <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling<br>
    <input type="checkbox" name="hobbies[]" value="Gaming"> Gaming<br>
    <input type="checkbox" name="hobbies[]" value="Cooking"> Cooking<br><br>

    <label for="feedback">Additional Feedback:</label><br>
    <textarea name="feedback" rows="4" cols="50"></textarea><br><br>

    <input type="submit" value="Submit Survey">
</form>

<?php
}
?>

</body>
</html>