<?php
class NumberInReverse{
    public $num = 0;
    function __construct($num)
    {
        $this->num =$num;
    }
    function get(){
        return $this->num;
    }
    function reverse(){
        $reverse = 0;
        $sum = 0;
        $n = $this->num;
        while ($n > 0)
        {
            $reverse = $reverse * 10;
            $reverse = $reverse + $n%10;
            $n = (int)($n/10);
        }
        $sum+=$reverse;
        return $sum;
    }
}
$num = trim(fgets(STDIN));
$num = strrev($num);
$reversed = new NumberInReverse($num);
echo $reversed->get();