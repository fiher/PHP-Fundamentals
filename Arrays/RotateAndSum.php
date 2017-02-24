<?php
  $stringOfNumbers = fgets(STDIN);
  $rotations = fgets(STDIN);
  $arrayToRotate = array_map('intval', explode(' ',$stringOfNumbers));
$length = count($arrayToRotate)-1;
  $sum = array_map('intval', explode(' ',$stringOfNumbers));
for ($i=0;$i<$length+1;$i++){
    $sum[$i] = 0;
}for ($i=0;$i<$rotations;$i++){
    $lastElement = $arrayToRotate[$length];
for ($k=$length;$k>0;$k--){

    $arrayToRotate[$k] = $arrayToRotate[$k-1];
}
 $arrayToRotate[0]= $lastElement;
for($j=0;$j<$length+1;$j++){
    $sum[$j] += $arrayToRotate[$j];
}
}
for ($i=0;$i<=$length;$i++){
    echo $sum[$i]." ";
}
