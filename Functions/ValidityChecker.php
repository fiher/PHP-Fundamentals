<?php
$input = explode(", ",trim(fgets(STDIN)));
$x1 = (int)($input[0]);
$y1 = (int)($input[1]);
$x2 = (int)($input[2]);
$y2 = (int)($input[3]);
$result = "";
$result .= printResult($x1, $y1, 0, 0, isInteger(calc2dDistance($x1, $y1)))."\n";
$result .=printResult($x2, $y2, 0, 0, isInteger(calc2dDistance($x2, $y2)))."\n";
$result .=printResult($x1, $y1, $x2, $y2, isInteger(calc2dDistance($x1, $y1, $x2, $y2)));
echo trim($result);
function calc2dDistance($x1, $y1, $x2 = 0, $y2 = 0) {
    return sqrt(pow($x2 - $x1, 2) + pow($y2 -$y1, 2));
}

function isInteger($num) {
    return $num === round($num);
}

function printResult($x1, $y1, $x2, $y2, $isInteger) {
    $result = "";
    if ($isInteger) {
        $result .= "{".$x1."}, {".$y1."} to {".$x2."}, {".$y2."} is valid";
        }
    else {
        $result .= "{".$x1."}, {".$y1."} to {".$x2."}, {".$y2."} is invalid";
        }
    return  trim($result);
}