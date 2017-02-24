<?php
$input = fgets(STDIN);
$array = array_map('intval',explode(" ",$input));
$match = true;
for ($i=0;$i<count($array);$i++){
    $leftSum = 0;
    $rightSum = 0;
    for ($k=0;$k<$i;$k++){
       $leftSum += $array[$k];
    }
    for ($j=$i+1;$j<count($array);$j++){
        $rightSum += $array[$j];
    }
    if($leftSum==$rightSum){
        echo $i;
        $match = false;
        break;
    }
}
if($match){
    echo "no";
}