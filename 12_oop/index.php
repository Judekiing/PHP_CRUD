<?php

require_once "Person.php";
require_once "Student.php";

$student = new Student("Francis", "Viele", '3232');


echo '<pre>';
    var_dump($student);
echo '</pre>'; 

// $p = new Person('Jude', 'Okorie' );
// $p->setAge(30);

// echo '<pre>';
//     var_dump($p);
// echo '</pre>'; 
// echo $p->getAge();

// $p2 = new Person('John', 'Smith');  
// echo '<pre>';
// var_dump($p2);
// echo '</pre>';

// echo Person::getCounter();



// echo $p -> name . '<br>';

// Create Person class in Person.php

// Create instance of Person

// Using setter and getter