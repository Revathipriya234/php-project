<?php
session_start();

$step = isset($_POST['step']) ? (int)$_POST['step'] : 1;

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($step) {
        case 1:
            if (isset($_POST['name'])) {
                $_SESSION['name'] = $_POST['name'];
                $step = 2;
            }
            break;
        case 2:
            if (isset($_POST['address'])) {
                $_SESSION['address'] = $_POST['address'];
                $step = 3;
            }
            break;
        case 3:
            $name = $_SESSION['name'] ?? '';
            $address = $_SESSION['address'] ?? '';
            session_destroy(); // Clear data after submission
            echo "<h2>Form Submitted Successfully!</h2>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Address:</strong> $address</p>";
            exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Multi-Step Form</title>
</head>
<body>
    <h2>Multi-Step Form - Step <?= $step ?></h2>

    <?php if ($step === 1): ?>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" required>
            <input type="hidden" name="step" value="1">
            <button type="submit">Next</button>
        </form>

    <?php elseif ($step === 2): ?>
        <form method="POST">
            <label>Address:</label>
            <input type="text" name="address" required>
            <input type="hidden" name="step" value="2">
            <button type="submit">Next</button>
        </form>

    <?php elseif ($step === 3): ?>
        <form method="POST">
            <p><strong>Name:</strong> <?= htmlspecialchars($_SESSION['name']) ?></p>
            <p><strong>Address:</strong> <?= htmlspecialchars($_SESSION['address']) ?></p>
            <input type="hidden" name="step" value="3">
            <button type="submit">Submit</button>
        </form>
    <?php endif; ?>
</body>
</html>