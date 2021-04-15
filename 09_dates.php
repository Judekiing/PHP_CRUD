<?php

// Print current date
echo date('Y-m-d H:i:s'). '<br>';


// Print yesterday
echo date('Y-m-d H:i:s', time() - 60 * 60 * 24) . '<br>';

// Different format: https://www.php.net/manual/en/function.date.php
echo date( 'F j Y, H:i:s') . '<br>';

// Print current timestamp
echo time() . '<br>';

// Parse date: https://www.php.net/manual/en/function.date-parse.php
$Parsed_date = date_parse('2021-04-01 08:00:00');
echo '<pre>';
var_dump($Parsed_date);
echo '</pre>';
// Parse date from format: https://www.php.net/manual/en/function.date-parse-from-format.php