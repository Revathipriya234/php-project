<?php
function isPalindrome($string) {
    $clean = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $string));
    return $clean == strrev($clean);
}

$input = "A man a plan a canal Panama";
if (isPalindrome($input)) {
    echo "\"$input\" is a palindrome.";
} else {
    echo "\"$input\" is not a palindrome.";
}
?>