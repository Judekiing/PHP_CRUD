<?php

// Declaring numbers
$a = 5;
$b = 4;
$c = 1.2;

// Arithmetic operations
echo ($a + $b) * $c. '<br>';
echo $a - $b. '<br>';
echo $a * $b. '<br>';
echo $a / $b. '<br>';
echo $a % $b. '<br>';


// Assignment with math operators
// $a += $b; echo $a. '<br>';

// Increment operator
echo $a++.'<br>';
echo ++$a.'<br>';

// Decrement operator
echo $a--.'<br>';
echo --$a.'<br>';


// Number checking functions
is_float(1.25);
is_double(1.25);
echo is_integer(5);
echo is_numeric('12.34');

// Conversion
$strNumber = '12.34'. '<br>';
$number = (float)$strNumber;
var_dump($number);
echo '<br>';
// Number functions
echo"abs(-15)". abs(-15) . '<br>'; 
echo"pow(2, 3)" . pow(2, 3) . '<br>'; 
echo"sqrt(64)". sqrt(64) . '<br>'; 
echo"max(2,3,3,4,5,4)". max(2,3,3,4,5,4) . '<br>'; 
echo"min(2,3)". min(2,3) . '<br>'; 
echo"round(2.4)".round(2.6) . '<br>'; 
echo "round(2.6)" . round(2.6) . '<br>';
echo"floor(2.6)" . floor(2.4) . '<br>'; 
echo"ceil(2.4)" . ceil(2.4) . '<br>'; 

// Formatting numbers
$number = 123456789.12345;
echo number_format($number, 2, '.', ',');

// https://www.php.net/manual/en/ref.math.php
