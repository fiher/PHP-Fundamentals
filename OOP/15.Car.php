<?php
$carInput = array_map('intval', explode(" ",trim(fgets(STDIN))));
$command = explode(" ",trim(fgets(STDIN)));
class Car{
    public $speed;
    public $fuel;
    public $fuelEconomy;
    public $travelled;
    public $time = 0;
    function __construct($speed,$fuel, $fuelEconomy) {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
    }
    function getFuel(){
        return $this->fuel;
    }
    function getDistance(){
        return $this->travelled;
    }
    function getHours(){
        return (int)($this->time/60);
    }
    function getMinutes(){
        return $this->time%60;
    }
    function travell ($distance){
        $hours = $distance/$this->speed;
        $fuelNeeded = ($this->fuelEconomy/100)*$distance;
        if($fuelNeeded>$this->fuel){
            $distance = ($this->fuel/$this->fuelEconomy)*100;
            $this->travelled += $distance;
            $this->time += ($distance/$this->speed)*60;
            $this->fuel = 0;
        }else{
            $this->travelled += $distance;
            $time = ($distance/$this->speed)*60;
            $this->time += $hours*60;
            $this->fuel -= $distance/$this->fuelEconomy;
        }
    }
}
$travelled = 0;
 $car = new Car($carInput[0],$carInput[1],$carInput[2]);
$result = '';
while($command[0] != "END"){
    switch ($command[0]){
        case 'Travel':
            $car->travell($command[1]);
            break;
        case 'Refuel':
            $car->fuel += $command[1];
            break;
        case 'Distance':
            $distance = $car->getDistance();
            $result .= "Total Distance: ".number_format(round($distance,1),1)."\n";
            break;
        case 'Time':
            $hours = $car->getHours();
            $minutes = $car->getMinutes();
            $result .= "Total Time: $hours hours and $minutes minutes\n";
            break;
        case 'Fuel':
            $fuel = $car->getFuel();
            $result .="Fuel left: ".number_format(round($fuel,1),1)." liters\n";
            break;
    }
    $command = explode(" ",trim(fgets(STDIN)));
}
echo trim($result);