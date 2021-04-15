<?php

// Create simple string
$name = 'Jude';
$string = 'Hello! I am '. $name . ' I am 28';
$string2 = "Hello! I am $name. Iam 28";

echo $string . '<br>' ;
echo $string2 . '<br>' ;


// String concatenation
echo 'Hello' . 'World' . 'and PHP' . '<br>';

// String functions
$string = "    Hello World    ";
echo "1 - " . strlen($string) . '<br>';
echo "2 - " . trim($string) . '<br>';
echo "3 - " . ltrim($string) . '<br>';
echo "4 - " . rtrim($string) . '<br>';
echo "5 - " . str_word_count($string) . '<br>';
echo "6 - " . strrev($string) . '<br>';
echo "7 - " . strtoupper($string) . '<br>';
echo "8 - " . strtolower($string) . '<br>';
echo "9 - " . ucfirst('hello') . '<br>';
echo "10 - " . lcfirst('HELLO') . '<br>';
echo "11 - " . ucwords('hello world') . '<br>';
echo "12 - " . strpos($string, 'world') . '<br>';
echo "13 - " . stripos($string, 'world') . '<br>';
echo "14 - " . substr($string, 8, 6) . '<br>';
echo "15 - " . str_replace('World', 'PHP', $string) . '<br>';
echo "16 - " . str_ireplace('world', 'PHP', $string) . '<br>';


// Multiline text and line breaks
$longText = "
    Hello, my name is Jude 
    I am 28,
    I love myself 
";
echo $longText;
echo nl2br($longText);


// Multiline text and reserve html tags
$longText2 = "
    Hello, my name is <b>Jude</b> 
    I am <b>28</b>,
    I love myself 
";
echo"1 - ". ($longText2). '<br>';
echo"2 - ". nl2br($longText2). '<br>';
echo"3 - ". htmlentities($longText2). '<br>';
echo"4 - ". nl2br(htmlentities($longText2)). '<br>';

echo html_entity_decode('am &lt;b&gt;28&lt;/b&gt;,<br />');


// https://www.php.net/manual/en/ref.strings.php