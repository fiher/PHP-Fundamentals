<?php
class Number{
    public $number;
    function __construct($number)
    {
        $this->number = $number;
    }
    function lastDigit(){
        $number = $this->number%10;
        switch ($number){
            case 1:
                return "one";
            case 2:
                return "two";
            case 3:
                return "three";
            case 4:
                return "four";
            case 5:
                return "five";
            case 6:
                return "six";
            case 7:
                return "seven";
            case 8:
                return "eight";
            case 9:
                return "nine";
            case 0:
                return "zero";
        }
    }
}
$num = trim(fgets(STDIN));
$number = new Number($num);
echo $number->lastDigit();