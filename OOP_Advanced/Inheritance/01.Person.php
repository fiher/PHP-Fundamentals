<?php
class Person{
    private $name;
    private $age;
    function __construct(string $name, int $age){
        $this->setName($name);
        $this->setAge($age);
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        if(strlen($name)<3){
            throw new Exception("Name’s length should not be less than 3 symbols!");
        }else {
            $this->name = $name;
        }
    }
    public function setAge($age)
    {
        if ($age < 1) {
            throw new Exception("Age must be positive!");
        }else{
        $this->age = $age;
        }
    }
}
