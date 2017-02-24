<?php
interface Buyer{
    public function buyFood();
}
class Citizen implements Buyer{
     public $food=0;
    public $name;
    public $age;
    public $id;
    public $birthdate;
    public function __construct($name,$age,$id,$birthdate)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->birthdate = $birthdate;
    }

    public function buyFood()
    {
     $this->food +=10;
    }
}
class Rebel implements Buyer{
    public $name;
    public $age;
    public $group;
    public $food = 0;

    public function __construct($name,$age,$group)
    {
        $this->name = $name;
        $this->age =$age;
        $this->group=$group;
    }
    public function buyFood()
    {
       $this->food+=5;
    }
}
$n = trim(fgets(STDIN));
$people = [];
for ($i=0;$i<$n;$i++){
    $input = explode(" ",trim(fgets(STDIN)));
    if(count($input)>3){
        $people[$input[0]] = new Citizen($input[0],$input[1],$input[2],$input[3]);
    }elseif(count($input)<=3){
        $people[$input[0]] = new Rebel($input[0],$i[1],$input[2]);
    }
}
$command = trim(fgets(STDIN));
while($command!="End"){
    if(key_exists($command,$people)){
        $people[$command]->buyFood();
    }

    $command = trim(fgets(STDIN));
}
$food = 0;
foreach ($people as $person){
    $food+= $person->food;
}
echo $food;