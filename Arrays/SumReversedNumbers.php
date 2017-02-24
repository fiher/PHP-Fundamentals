<?php
$input = fgets(STDIN);
$arrayOfNums = array_map('intval',explode(" ",$input));
$sum=0;
for ($i=0;$i<count($arrayOfNums);$i++){
    $reverse = 0;
    $n=$arrayOfNums[$i];
    while ($n > 0)
    {
        $reverse = $reverse * 10;
        $reverse = $reverse + $n%10;
        $n = (int)($n/10);
    }
    $sum+=$reverse;
}
echo $sum;