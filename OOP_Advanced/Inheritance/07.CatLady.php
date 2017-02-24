<?php
class Siamese{
    public $breed = "Siamese";
    public $name;
    public $earSize;
    public function __construct($name,$earsize)
    {
        $this->name = $name;
        $this->earSize = $earsize;
    }
    public function __toString()
    {
        return $this->breed." ".$this->name." ".$this->earSize;
    }
}
class Cymric{
    public $breed = "Cymric";
    public $name;
    public $furLength;
    public function __construct($name,$furLength){
        $this->name = $name;
        $this->furLength = $furLength;
    }
    public function __toString()
    {
        return $this->breed." ".$this->name." ".$this->furLength;
    }
}
class StreetExtraordinaire{
    public $breed = "StreetExtraordinaire";

    public $name;
    public $decibelsOfMeows;
    public function __construct($name,$decibelsOfMeows)
    {
        $this->name = $name;
        $this->decibelsOfMeows = $decibelsOfMeows;
    }
    public function __toString()
    {
        return $this->breed." ".$this->name." ".$this->decibelsOfMeows;
    }
}
$command = explode(" ",trim(fgets(STDIN)));
$cats = array();
$classes = array("Siamese"=>Siamese::class,"Cymric"=>Cymric::class,"StreetExtraordinaire"=>StreetExtraordinaire::class);
while($command[0] !="End"){
    $cats[] = new $classes[$command[0]]($command[1],$command[2]);
    $command = explode(" ",trim(fgets(STDIN)));
}
$specialCat = trim(fgets(STDIN));
foreach ($cats as $cat){
    if($cat->name == $specialCat){
    echo $cat;
        exit;
    }
}