<?php
class Person
{
    public $name;
    public $age;

    function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }
}
$person = new Person('Pesho',20);
echo(count(get_object_vars($person)));
