<?php
class Car{
    public $speed;
    public $fuel;
    public $fuelEconomy;
    public $travelled;
    public $time;
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

        return $this->time/60;
    }
    function getMinutes(){
        return $this->time%60;
    }
    function travell ($distance){
        $hours = $distance/$this->speed;
        $fuelNeeded = $hours*$this->fuelEconomy;
        if($fuelNeeded>$this->fuel){
            $distance = ($this->fuel/$this->fuelEconomy)*$this->speed;
            $this->travelled += $distance;
            $this->time += $distance*$this->speed;
            $this->fuel = 0;
        }else{
            $this->travelled += $distance;
            $this->time += $distance*$this->speed;
            $this->fuel = ($distance/$this->speed)*$this->fuelEconomy;
        }

    }
}
$car = new Car(100,20,20);

var_dump($car);
