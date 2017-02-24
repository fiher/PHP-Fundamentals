<?php
class Tire
{
    private $age;
    private $pressure;
    public function __construct(int $age, float $pressure)
    {
        $this->age = $age;
        $this->pressure = $pressure;
    }
    public function getPressure(): float
    {
        return $this->pressure;
    }
}
class Cargo
{
    private $weight;
    private $type;
    public function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }
    public function getType(): string
    {
        return $this->type;
    }
}
class Engine
{
    private $speed;
    private $power;
    public function __construct(int $speed, int $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }
    public function getPower(): int
    {
        return $this->power;
    }
}
class Car
{
    private $model;
    private $engine;
    private $cargo;
    private $tires = [];
    public function __construct(string $model,
                                Engine $engine,
                                Cargo $cargo,
                                Tire $tire1,
                                Tire $tire2,
                                Tire $tire3,
                                Tire $tire4)
    {
        $this->model = $model;
        $this->cargo = $cargo;
        $this->engine = $engine;
        array_push($this->tires, $tire1, $tire2, $tire3, $tire4);
    }
    public function __toString()
    {
        return $this->model;
    }
    public function getModel(): string
    {
        return $this->model;
    }
    public function getEngine(): Engine
    {
        return $this->engine;
    }
    public function getCargo(): Cargo
    {
        return $this->cargo;
    }
    public function getTires(): array
    {
        return $this->tires;
    }
}
class App
{
    /**
     * @var Car[]
     */
    private $cars = [];
    public function start()
    {
        $this->processInput();
    }
    private function processInput()
    {
        $numOfCars = intval(trim(fgets(STDIN)));
        for ($i = 0; $i < $numOfCars; $i++) {
            $carDetails = explode(" ",trim(fgets(STDIN)));
            $model = $carDetails[0];
            $engineSpeed = intval($carDetails[1]);
            $enginePower = intval($carDetails[2]);
            $engine = new Engine($engineSpeed, $enginePower);
            $cargoWeight = intval($carDetails[3]);
            $cargoType = $carDetails[4];
            $cargo = new Cargo($cargoWeight, $cargoType);
            $tire1Pressure = floatval($carDetails[5]);
            $tire1Age = intval($carDetails[6]);
            $tire1= new Tire($tire1Age, $tire1Pressure);
            $tire2Pressure = floatval($carDetails[7]);
            $tire2Age = intval($carDetails[8]);
            $tire2= new Tire($tire2Age, $tire2Pressure);
            $tire3Pressure = floatval($carDetails[9]);
            $tire3Age = intval($carDetails[10]);
            $tire3= new Tire($tire3Age, $tire3Pressure);
            $tire4Pressure = floatval($carDetails[11]);
            $tire4Age = intval($carDetails[12]);
            $tire4= new Tire($tire4Age, $tire4Pressure);
            $car  = new Car($model, $engine, $cargo, $tire1, $tire2, $tire3, $tire4);
            $this->cars[] = $car;
        }
        $printType = trim(fgets(STDIN));
        $filteredCars = null;
        if ($printType === "flamable") {
            $filteredCars = $this->getFlammableCars();
        } else {
            $filteredCars = $this->getFragileCars();
        }
        $result = '';
        foreach ($filteredCars as $car) {
            $result .= $car."\n";
        }
        echo trim($result);
    }
    private function getFlammableCars(): array
    {
        return array_filter($this->cars, function (Car $car) {
            if ($car->getCargo()->getType() === "flamable" &&
                $car->getEngine()->getPower() > 250) {
                return true;
            }
            return false;
        });
    }
    private function getFragileCars(): array
    {
        return array_filter($this->cars, function (Car $car) {
            if ($car->getCargo()->getType() === "fragile") {
                foreach ($car->getTires() as $tire) {
                    if ($tire->getPressure() < 1) {
                        return true;
                    }
                }
            }
            return false;
        });
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