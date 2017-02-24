<?php
class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;
    public function __construct(string $model, Engine $engine, int $weight = null, string $color = null)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }
    public function __toString(): string
    {
        $output = "{$this->model}:" . PHP_EOL;
        $output .= $this->engine;
        $weight = $this->weight == null ? "n/a" : $this->weight;
        $output .= "  Weight: {$weight}" . PHP_EOL;
        $color = $this->color == null ? "n/a" : $this->color;
        $output .= "  Color: {$color}";
        return $output;
    }
}
class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;
    public function __construct(string $model, int $power, int $displacement = null, string $efficiency = null)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }
    public function getModel(): string
    {
        return $this->model;
    }
    public function __toString(): string
    {
        $output = "  {$this->getModel()}:" . PHP_EOL;
        $output .= "    Power: {$this->power}" . PHP_EOL;
        $displacement = $this->displacement == null ? "n/a" : $this->displacement;
        $output .= "    Displacement: {$displacement}" . PHP_EOL;
        $efficiency = $this->efficiency == null ? "n/a" : $this->efficiency;
        $output .= "    Efficiency: {$efficiency}" . PHP_EOL;
        return $output;
    }
}
class App
{
    /**
     * @var Engine[]
     */
    private $engines = [];
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
        $enginesCount = intval($this->readLine());
        for ($i = 0; $i < $enginesCount; $i++) {
            $engineData = explode(" ", $this->readLine());
            $engineModel = $engineData[0];
            $enginePower = intval($engineData[1]);
            $engineDisplacement = null;
            $engineEfficiency = null;
            if (count($engineData) > 2) {
                if (is_numeric($engineData[2])) {
                    $engineDisplacement = intval($engineData[2]);
                } else {
                    $engineEfficiency = $engineData[2];
                }
            }
            if (count($engineData) > 3) {
                $engineEfficiency = $engineData[3];
            }
            $selectedEngine = new Engine($engineModel, $enginePower, $engineDisplacement, $engineEfficiency);
            $this->addEngine($selectedEngine);
        }
        $carsCount = intval($this->readLine());
        for ($i = 0; $i < $carsCount; $i++) {
            $carData = explode(" ", $this->readLine());
            $carModel = $carData[0];
            $carEngine = $carData[1];
            $carWeight = null;
            $carColor = null;
            if (count($carData) > 2) {
                if (is_numeric($carData[2])) {
                    $carWeight = intval($carData[2]);
                } else {
                    $carColor = $carData[2];
                }
            }
            if (count($carData) > 3) {
                $carColor = $carData[3];
            }
            $selectedEngine = $this->getEngineByName($carEngine);
            $car = new Car($carModel, $selectedEngine, $carWeight, $carColor);
            $this->addCar($car);
        }
        $this->printCars();
    }
    private function addEngine(Engine $engine)
    {
        $this->engines[$engine->getModel()] = $engine;
    }
    private function addCar(Car $car)
    {
        $this->cars[] = $car;
    }
    private function getEngineByName(string $name): Engine
    {
        return $this->engines[$name];
    }
    private function printCars()
    {
        foreach ($this->cars as $car) {
            $this->writeLine($car);
        }
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
