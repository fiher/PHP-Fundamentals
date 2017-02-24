<?php
interface IPerson{
    public function getName();
    public function getAge();
}
class Citizent implements IPerson{
    private $name;
    private $age;
    public function getName()
    {
      return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function __construct($name,$age)
    {
        $this->name =$name;
        $this->age =$age;
    }
    public function __toString()
    {
     return $this->name."\n".$this->age;
    }
}
$name = trim(fgets(STDIN));
$age = trim(fgets(STDIN));
$person = new Citizent($name,$age);
echo $person;
