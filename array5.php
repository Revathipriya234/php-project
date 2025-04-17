<?php
$cars = [
    ["Volvo", "BMW", "Toyota"],
    ["Honda", "Chevy", "Ford"],
    ["Nissan", "Mazda", "Hyundai"],
    ["Kia", "Audi", "Mercedes"]
];

for ($row = 0; $row < 4; $row++) {
    echo "Row Number $row" . PHP_EOL;
    for ($col = 0; $col < 3; $col++) {
        echo "- " . $cars[$row][$col] . PHP_EOL;
    }
    echo PHP_EOL; // Blank line after each row
}
?>