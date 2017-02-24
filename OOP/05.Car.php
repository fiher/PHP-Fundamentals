<?php

namespace Racing\Models;
class Car
{
    const INIT_DISTANCE = 0.;
    private $model;
    private $fuel;
    private $fuelConsumption;
    private $distanceTraveled;
    public function __construct(string $model, float $fuel, float $fuelConsumption)
    {
        $this->model = $model;
        $this->fuel = $fuel;
        $this->fuelConsumption = $fuelConsumption;
        $this->distanceTraveled = self::INIT_DISTANCE;
    }
    public function getModelName(): string
    {
        return $this->model;
    }
    public function travel(float $distance)
    {
        $fuelNeeded = $distance * $this->fuelConsumption;
        if (round($fuelNeeded,14) > round($this->fuel,14)) {
            throw new \Exception("Insufficient fuel for the drive");
        }else {
            $this->fuel = round($this->fuel,2) - round($fuelNeeded,2);
            $this->distanceTraveled += $distance;
        }
    }
    public function __toString(): string
    {
        return $this->model . " " . number_format($this->fuel, 2) . " " . $this->distanceTraveled;
    }
}
class App
{
    const END_COMMAND = "End";
    private $cars = [];
    public function start()
    {
        $this->processInput();
    }
    private function processInput()
    {
        $numOfCars = intval($this->readLine());
        for ($i = 0; $i < $numOfCars; $i++) {
            $carDetails = explode(" ", $this->readLine());
            $car = new Car(...$carDetails);
            $this->addCar($car);
        }
        while (true) {
            $commandTokens = explode(" ", $this->readLine());
            if ($commandTokens[0] === self::END_COMMAND) {
                break;
            }
            try {
                $car = $this->cars[$commandTokens[1]];
                $car->travel(floatval($commandTokens[2]));
            } catch (\Exception $e) {
                $this->writeLine($e->getMessage());
            }
        }
        $this->renderAllCars();
    }
    private function addCar(Car $car)
    {
        $this->cars[$car->getModelName()] = $car;
    }
    private function renderAllCars()
    {
        $result = '';
        foreach ($this->cars as $carModel => $car) {
            //$this->writeLine($car);
            $result .= $car."\n";
        }
        echo trim($result);
    }
    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }
    private function writeLine($content)
    {
        echo $content . PHP_EOL;
    }
}
$app = new App();
$app->start();