<?php
class Animal{
    private $name;
    private $age;
    public function getAge()
    {
        return $this->age;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getName()
    {
        return $this->name;
    }
    private $gender;
    function __construct($name,$age,$gender)
    {
        if(strlen($name)<0){
            throw new Error("Invalid input!");
        }

        $this->name = $name;
        if($age<0){
            throw new Error("Invalid input!");
        }
        $this->age=$age;
        if(!($gender == "Female"||$gender =="Male")){
            throw new Error("Invalid input!");
        }
        $this->gender=$gender;
    }
}
class Cat extends Animal{
    public $produceSound = "MiauMiau";
    public function __toString()
    {
        return "Cat ".$this->getName()." ".$this->getAge()." ".$this->getGender()."\n".$this->produceSound."\n";
    }
}
class Kittens extends Animal{
    public $produceSound = "Miau";
    public function __construct($name, $age, $gender)
    {
        parent::__construct($name, $age, $gender);
        if($gender !="Female"){
            throw new Error("Invalid input|");
        }
    }
    public function __toString()
    {
        return "Kittes ".$this->getName()." ".$this->getAge()." ".$this->getGender()."\n".$this->produceSound."\n";
    }
}
class Tomcat extends Animal{

    public $produceSound = "Give me one million b***h";
    public function __construct($name, $age, $gender)
    {
        parent::__construct($name, $age, $gender);
        if($gender !="Male"){
            throw new Error("Invalid input|");
        }
    }
    public function __toString()
    {
        return "Tomcat ".$this->getName()." ".$this->getAge()." ".$this->getGender()."\n".$this->produceSound."\n";
    }
}
class Dog extends Animal{
    public $produceSound = "BauBau";
    public function __toString()
    {
        return "Dog ".$this->getName()." ".$this->getAge()." ".$this->getGender()."\n".$this->produceSound."\n";
    }
}
class Frog extends Animal{
    public $produceSound = "Frogggg";
    public function __toString()
    {
        return "Frog ".$this->getName()." ".$this->getAge()." ".$this->getGender()."\n".$this->produceSound."\n";
    }
}
$classes = array("Cat"=>Cat::class,"Kittens"=>Kittens::class,"Tomcat"=>Tomcat::class,"Dog"=>Dog::class,"Frog"=>Frog::class);
$animals = array();
try {
    while (true) {
        $type = trim(fgets(STDIN));
        if ($type == "Beast!") {
            break;
        }

        $info = explode(" ", trim(fgets(STDIN)));

        if (count($info) < 3) {
            throw new Error("Invalid input!");
        }
        if(!key_exists($type,$classes)){
            throw new Error();
        }
            $animals[] = new $classes[$type]($info[0], $info[1], $info[2]);

    }
    foreach ($animals as $animal){
        echo $animal;
    }
}catch (Error $e) {
    echo "Invalid input!";
    exit();
}
