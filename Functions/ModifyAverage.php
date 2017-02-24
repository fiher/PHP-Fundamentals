<?php
$digits = trim(fgets(STDIN));
$average = 0;
while($average<=5){
    $sum = 0;
    $len = strlen($digits);
    //echo "$len number of digits in $digits and the average is";
    for ($i=0;$i<strlen($digits);$i++){
        $sum += (int)($digits[$i]);
    }
    if($sum/strlen($digits)<=5){
        $digits.="9";
    }else{
        break;
    }
    $average = $sum/strlen($digits);
    //echo $average."\n";
}
    echo $digits;