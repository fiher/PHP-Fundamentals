<?php
interface Car{
    public function brakes();
    public function gasPedal();
}
class Ferrari implements Car{
    private $type = "488-Spider";
    private $driver;
    public function getDriver()
    {
        return $this->driver;
    }

    public function setDriver($driver)
    {
        $this->driver = $driver;
    }
    function getType()
    {
        return $this->type;
    }
    public function brakes()
    {
        return "Brakes!";
    }
    public function gasPedal()
    {
        return "Zadu6avam sA!";
    }
    public function __construct($driver)
    {
        $this->setDriver($driver);
    }
    public function __toString()
    {
        return $this->getType()."/".$this->brakes()."/".$this->gasPedal()."/".$this->getDriver();
    }

}
$driver = trim(fgets(STDIN));
$ferrari = new Ferrari($driver);
echo $ferrari;