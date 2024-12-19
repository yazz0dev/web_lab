<?php

// Store student names in an array
$students = array("Alice", "Bob", "Charlie", "David", "Eve");


echo "<h2>Original Array:</h2>";
print_r($students);

asort($students);

echo "<h2>Array Sorted in Ascending Order (asort):</h2>";
print_r($students);

arsort($students);

echo "<h2>Array Sorted in Descending Order (arsort):</h2>";
print_r($students);

?>