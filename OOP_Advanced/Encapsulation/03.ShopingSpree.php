<?php
class Person{

    private $name;
    private $money;
    private $products= array();

    public function getName()
    {
        return $this->name;
    }
    private function setName($name)
    {
        $this->name = $name;
    }
    public function getMoney()
    {
        return $this->money;
    }
    public function setMoney($money,$cost)
    {
        $this->money = $money-$cost;
    }
    public function getProducts()
    {
        return $this->products;
    }
    public function setProducts($productName)
    {
        $this->products[] = $productName;
    }

    public function __construct($name,$money)
    {
        $this->setName($name);
        $this->setMoney($money,0);
    }

}
class Product{
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getCost()
    {
        return $this->cost;
    }
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    private $name;
    private $cost;

    public function __construct($name,$cost)
    {
        $this->setName($name);
        $this->setCost($cost);
    }
}
$people = array();
$products = array();
$peopleInput = explode(";",trim(fgets(STDIN)));
$productsInput = explode(";",trim(fgets(STDIN)));
$isException = false;
//$peopleInput = array_filter($peopleInput, function($value) { return $value !== ''; });
//$productsInput = array_filter($productsInput, function($value) { return $value !== ''; });
for ($i=0;$i<count($productsInput)-1;$i++){
    $products[] = new Product(explode("=",$productsInput[$i])[0],explode("=",$productsInput[$i])[1]);

}
for ($i=0;$i<count($peopleInput)-1;$i++){
    try {
        if(!$isException) {
            if (strlen(explode("=", $peopleInput[$i])[0]) == 0) {
                $isException = true;
                throw new Exception("Name cannot be empty");
            } elseif (explode("=", $peopleInput[$i])[1] < 0) {
                $isException = true;
                throw new Exception("Money cannot be negative");
            }
        }
    }catch (Exception $e) {
        echo $e->getMessage();
    }
    if(!$isException) {
        $people[] = new Person(explode("=", $peopleInput[$i])[0], explode("=", $peopleInput[$i])[1]);
    }
}
if(!$isException) {
    $action = trim(fgets(STDIN));
    while ($action != "END") {
        foreach ($people as $person) {
            if ($person->getName() == explode(" ", $action)[0]) {
                foreach ($products as $product){
                    if($product->getName() == explode(" ", $action)[1]){
                        if($person->getMoney() < $product->getCost()){
                            echo $person->getName()." can't afford ".$product->getName()."\n";
                        }else{
                            $person->setProducts(explode(" ", $action)[1]);
                            $person->setMoney($person->getMoney(),$product->getCost());
                            echo $person->getName()." bought ".$product->getName()."\n";
                        }
                    }
                }
            }
        }
        $action = trim(fgets(STDIN));
    }
    $result = '';
    foreach ($people as $person) {
        if(empty($person->getProducts())){
            $result .= $person->getName()." - Nothing bought\n";
        }else {
            $result .= $person->getName() . " - " . implode(',', $person->getProducts()) . "\n";
        }
    }
    echo trim($result);
}
