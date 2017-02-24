<?php
class Dough{
    private $modifiers = array("white"=>1.5,"wholegrain"=>1.0,"crispy"=>0.9,"chewy"=>1.1,"homemade"=>1.0);
    private $caloriesDough=0;
    public function getDoughCalories(){
        return $this->caloriesDough;
}
    public function setDoughCalories($types,$grams){
        $modifier = 1;
        foreach ($types as $modifiers){
            if(key_exists(strtolower($modifiers),$this->modifiers)){
                $modifier *= $this->modifiers[strtolower($modifiers)];
            }else{
                throw new Exception("Invalid type of dough.");
            }
        }
        if($grams>200||$grams<1){
            throw new Exception("Dough weight should be in the range [1..200].");
        }else {
            $this->caloriesDough = (2 * $grams) * $modifier;
        }
        echo "Dough ".$this->caloriesDough."\n";
}

}
class Topping extends Dough{
    private $toppingsCount =0;
    private $toppings = array("meat"=>1.2,"veggies"=>0.8,"crispy"=>0.9,"cheese"=>1.1,"sauce"=>0.9);
    private $caloriesToppings=0;
    public function getCalories(){
        return $this->caloriesToppings;
    }
    public function setCalories($modifiers,$grams){
        $this->toppingsCount++;
        if($this->toppingsCount<0||$this->toppingsCount>10){
            throw new Exception("Number of toppings should be in range [0..10].");
        }
        $modifier = 1;
        if(key_exists(strtolower($modifiers),$this->toppings)){
            $modifier *= $this->toppings[strtolower($modifiers)];
        }else{
            throw new Exception("Cannot place $modifiers on top of your pizza.");
        }
        if($grams>50||$grams<1){
            throw new Exception("$modifiers weight should be in the range [1..50].");
        }
        $this->caloriesToppings += (2 * $grams) * $modifier;
        echo "Calories ".$this->caloriesToppings."\n";
    }
}
class Pizza extends Topping{
    public $name;
    public $calories =0;
    public function setPizza(){
        echo "Pizza ".parent::getCalories()."caloriesTop and ".parent::getDoughCalories();
        $this->calories = parent::getCalories()+ parent::getDoughCalories();
    }
    public function __construct($name)
    {
        if(strlen($name)==0||strlen($name)>15){
            throw new Exception("Pizza name should be between 1 and 15 symbols.");
        }
        $this->name = $name;
    }
}
try {
    $input = explode(" ",trim(fgets(STDIN)));
    $pizza = new Pizza($input[1]);
    $dough = explode(" ",trim(fgets(STDIN)));
    $types = array($dough[1],$dough[2]);
    $pizza->setDoughCalories($types,$dough[3]);
    for ( $i=0;$i<$input[2];$i++){
       $toppings = explode(" ",trim(fgets(STDIN)));
        $pizza->setCalories($toppings[1],$toppings[2]);
    }
}catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
$pizza->setPizza();
echo $pizza->name." - ".sprintf('%0.2f',$pizza->calories);
