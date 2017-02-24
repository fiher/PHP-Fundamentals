<?php
class DateModifier{
    public $startDate;
    public $endDate;
    function __construct($date1, $date2)
    {
        $this->startDate = $date1;
        $this->endDate = $date2;
    }
    function getDiff(){
        $date = explode(' ',$this->startDate);
        $date = implode('/',$date);
        $date2 = explode(' ',$this->endDate);
        $date2 = implode('/',$date2);
        $date =  new DateTime($date);
        $date2 = new DateTime($date2);
        $interval = $date->diff($date2);
        return$interval->format('%a')."\n";
    }
}
$date = trim(fgets(STDIN));
$date2 = trim(fgets(STDIN));
$dateDif =  new DateModifier($date,$date2);
echo trim($dateDif->getDiff());