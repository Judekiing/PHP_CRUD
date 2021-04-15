<?php

// What is a variable
// 

// Variable types

/* 
    String
    Integer 
    Float/Double
    Boolean
    Null
    Array
    Object
    REsource
*/

// Declare variables

$name = 'Jude';
$age = 28; 
$isMale = true;
$height = 1.85;
$salary = null;

echo $name .'<br>';
echo $age .'<br>';
echo $isMale .'<br>';
echo $height .'<br>';
echo $salary .'<br>';




// Print the variables. Explain what is concatenation
echo gettype($name).'<br>';
echo gettype($age).'<br>';
echo gettype($height).'<br>';
echo gettype($isMale).'<br>';
echo gettype($salary).'<br>';

// Print types of the variables


// Print the whole variable
var_dump($name, $age, $salary, $height). '<br>';


// Change the value of the variable
$name = false;

// Print type of the variable
echo gettype($name). '<br>';


// Variable checking functions
echo is_string($name). '<br>'; //false
echo is_int($age);
is_bool($isMale);

// Check if variable is defined
isset($name);

// Constants
define('PI', 3.14);
echo PI.'<br>';

// Using PHP built-in constants
echo SORT_ASC.'<br>';
echo PHP_INT_MAX.'<br>';
