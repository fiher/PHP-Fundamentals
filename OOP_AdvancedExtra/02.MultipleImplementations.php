<?php
interface IPerson{
    public function getName();
    public function getAge();
}
interface identifiable{
    public function getId();

}
interface Birthdate{
    public function getBirthDate();
}
class Citizent implements IPerson,identifiable,Birthdate{
    private $name;
    private $id;
    private $birthdate;
    private $age;
    public function getId()
    {
     return $this->id ;
    }
    public function getBirthDate()
    {
     return $this->birthdate;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function __construct($name,$age,$id,$birthdate)
    {
        $this->name =$name;
        $this->age =$age;
        $this->id = $id;
        $this->birthdate = $birthdate;
    }
    public function __toString()
    {
        return $this->name."\n".$this->age."\n".$this->id."\n".$this->birthdate;
    }
}
$name = trim(fgets(STDIN));
$age = trim(fgets(STDIN));
$id = trim(fgets(STDIN));
$birthdate = trim(fgets(STDIN));
$person = new Citizent($name,$age,$id,$birthdate);
echo $person;