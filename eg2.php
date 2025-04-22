<?php
$sentence = "PHP is fast. PHP is flexible. PHP is fun!";
$words = str_word_count(strtolower($sentence), 1);
$frequency = array_count_values($words);

echo "<h3>Word Frequency:</h3>";
foreach ($frequency as $word => $count) {
    echo "$word : $count\n";
}
?>
