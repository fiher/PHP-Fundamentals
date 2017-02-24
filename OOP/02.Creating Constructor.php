<?php
$name = trim(fgets(STDIN));
$age = trim(fgets(STDIN));
class Person
{
    public $name;
    public $age;

    function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }
}
$person = new Person($name, $age);
echo $person->name." ".$person->age;