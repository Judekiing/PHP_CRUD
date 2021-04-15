<?php

// Create array
$fruits = ["Banana", "Apple", "Orange"];

// Print the whole array
echo '<pre>';
var_dump($fruits);
echo '</pre>';


// Get element by index
echo $fruits[0]. '<br>';

// Set element by index
$fruits[0] = 'Peach';

echo '<pre>';
var_dump($fruits);
echo '</pre>';


// Check if array has element at index 2
echo isset($fruits[2]);

// Append element
$fruits[] = 'Banana';

echo'<pre>';
 (var_dump($fruits));
echo'</pre>';

// Print the length of the array
echo count($fruits). '<br>';


// Add element at the end of the array
array_push($fruits, 'foo');

echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Remove element from the end of the array
array_pop($fruits, );
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Add element at the beginning of the array
array_unshift($fruits, 'Bar');
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Remove element from the beginning of the array
echo array_shift($fruits);

// Split the string into an array
$string = "Banana,Apple, Peach";
echo '<pre>';
var_dump(explode(",", $string));
echo '</pre>';

// Combine array elements into string
echo implode("&", $fruits); 

// Check if element exist in the array
echo '<pre>';
var_dump(in_array('Mango', $fruits));
echo '</pre>';

// Search element index in the array
echo '<pre>';
var_dump(array_search('Apple', $fruits));
echo '</pre>';

// Merge two arrays
$vegetables = ["Potatoes", "Cucumber"];
$food = array_merge($fruits, $vegetables);

echo '<pre>';
var_dump($food);
// var_dump([...$fruits, ...$vegetables]);
echo '</pre>';


// Sorting of array (Reverse order also)
echo '<pre>';
var_dump($fruits);
echo '</pre>';
rsort($fruits);
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// https://www.php.net/manual/en/ref.array.php

