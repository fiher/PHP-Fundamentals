<?php
class Citizen{
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

}
class Robot{
    public $model;
    public $id;
    public $birthdate = "NaN";
    public function __construct($model,$id)
    {
        $this->model = $model;
        $this->id=$id;
    }
}
class Pet{
    public $name;
    public $birthdate;
    public function __construct($name,$birthdate)
    {
        $this->birthdate = $birthdate;
        $this->name = $name;
    }
}
$everyone = [];
while(true){
    $command = explode(" ",trim(fgets(STDIN)));
    if($command[0]=="End"){
        break;
    }
    if($command[0] == "Citizen"){
        $everyone[] = new Citizen($command[1],$command[2],$command[3],$command[4]);
    }elseif($command[0] =="Robot"){
        $everyone[] = new Robot($command[1],$command[2]);
    }else{
        $everyone[] = new Pet($command[1],$command[2]);
    }
}
$birthdate = trim(fgets(STDIN));
$match = false;
foreach ($everyone as $someone){
    if(strpos($someone->birthdate,$birthdate)!== false){
        $match=true;
        echo $someone->birthdate."\n";
    }
}
if(!$match){
    echo "<no output>";
}