<?php
// ============================================
// Associative arrays
// ============================================

// Create an associative array
$person = [
    'first_name' => 'Uchechukwukama',
    'surname' => 'Okorie',
    'age' => '28',
    'hobbies' => ['Tennis', 'Research', 'Video Games']
];
echo '<pre>';
var_dump($person);
echo '</pre>';

// Get element by key
echo $person['first_name'];

// Set element by key#
$person['channnel'] = 'citycruizMedia';
echo '<pre>';
var_dump($person);
echo '</pre>';

 // Null coalescing assignment operator. Since PHP 7.4
if (!isset($person['address'])) {
    $person['address'] = 'unknown';
}
echo '<pre>';
var_dump($person);
echo '</pre>';

// Check if array has specific key

// Print the keys of the array
echo '<pre>';
var_dump (array_keys($person));
echo '</pre>';

// Print the values of the array
echo '<pre>';
var_dump (array_values($person));
echo '</pre>';

// Sorting associative arrays by values, by keys
ksort($person);
echo '<pre>';
var_dump ($person);
echo '</pre>';

asort($person);
echo '<pre>';
var_dump ($person);
echo '</pre>';

// Two dimensional arrays
$todos = [
    ['title' => 'Todo title 1', 'completed' =>true],
    ['title' => 'Todo title 2', 'completed' =>false],
];

echo '<pre>';
var_dump($todos);
'</pre>';