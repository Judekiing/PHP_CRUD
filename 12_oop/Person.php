<?php
// What is class and instance

class Person{
    public $name;
    public $surname;
    protected $age;
    public static $counter = 0;


    public function __construct($name, $surname){
        echo ($surname.' ' .$name);
        $this->name =$name;
        $this->surname = $surname;
        $this->age = null;
        self::$counter++;
    }

    public function setAge($age){
        $this-> age = $age;
    }

    public function getAge(){
        return $this -> age;
    }

    public static function getCounter(){
        return self::$counter;
    }
}
