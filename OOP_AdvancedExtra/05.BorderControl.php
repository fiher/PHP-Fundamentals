<?php
class Citizen{
    public $name;
    public $age;
    public $id;
    public function __construct($name,$age,$id)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
    }

}
class Robot{
    public $model;
    public $id;
    public function __construct($model,$id)
    {
        $this->model = $model;
        $this->id=$id;
    }
}
$everyone = [];
while(true){
    $command = explode(" ",trim(fgets(STDIN)));
    if($command[0]=="End"){
        break;
    }
    if(count($command)==3){
        $everyone[] = new Citizen($command[0],$command[1],$command[2]);
    }else{
        $everyone[] = new Robot($command[0],$command[1]);
    }
}
$fakeID = trim(fgets(STDIN));
foreach ($everyone as $someone){
    $match = true;
    for ($i=0;$i<strlen($fakeID);$i++){
        $fakeDigit = $fakeID[strlen($fakeID)-1-$i];
        $idDigit = $someone->id[strlen($someone->id)-1-$i];
        if($idDigit==$fakeDigit){

        }else{
            $match=false;
        }
    }
    if($match){
        echo $someone->id."\n";
    }
}
