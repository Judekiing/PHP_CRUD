<?php

$age = 20;
$salary = 300000;

// Sample if
echo '<pre>';
if($age ==20){
    echo "1";
}
echo '</pre>';
// Without circle braces
if($age ==20)    echo "1";

// Sample if-else
echo '<pre>';
if($age > 21){
    echo "1";
}else{
echo "2";
} 
echo '</pre>';
// Difference between == and ===
echo '<pre>';
$age == 20; //true
$age == '20'; //true

$age === 20; //true
$age === '20'; //false
echo '</pre>';

// if AND
if ($age ==   20 && $salary === 300000){
    echo "Do something";
}
// if OR
if ($age >   20 || $salary === 300000){
    echo "Do something";
}
// Ternary if
echo $age <22 ? 'Young' : 'Old';

// Short ternary
$myAge = $age ?: 18;
echo '<pre>';
var_dump($myAge);
echo '</pre>';

// Null coalescing operator
$myName = isset($name)? $name :'John';
$myName = $name ?? 'John';

// switch
$userRole = 'admin';//editor, user, admin
switch ($userRole){
    case 'admin':
        echo 'admin';
        break;
    case 'editor':
        echo 'editor';
        break;
    case 'user':
        echo 'user';
        break;
    default:
        echo 'Invalid User';
         
}