<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Dropdown Example</title>
</head>
<body>
<h2>Select Country and City</h2>

<?php
// Define countries and their cities
$countries = [
    "USA" => ["New York", "Los Angeles", "Chicago"],
    "Canada" => ["Toronto", "Vancouver", "Montreal"],
    "India" => ["Delhi", "Mumbai", "Bangalore"]
];

// Get selected country
$selected_country = $_POST['country'] ?? '';
$cities = $selected_country && isset($countries[$selected_country]) ? $countries[$selected_country] : [];
?>


<form method="post" action="">
    <!-- Country Dropdown -->
    <label for="country">Country:</label>
    <select name="country" id="country" onchange="this.form.submit()">
    <option value="">--Select Country--</option>
    <?php foreach ($countries as $country => $cityList): ?>
    <option value="<?= $country ?>" <?= $selected_country == $country ? 'selected' : '' ?>>
        <?= $country ?>
    </option>
    <?php endforeach; ?>
    </select>

    <br><br>

    <!-- City Dropdown -->
    <label for="city">City:</label>
    <select name="city" id="city">
        <option value="">--Select City--</option>
        <?php foreach ($cities as $city): ?>
            <option value="<?= $city ?>"><?= $city ?></option>
        <?php endforeach; ?>
    </select>

    <br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>