<?php
$input = fgets(STDIN);
$arrayOfNums = array_map('intval',explode(" ",$input));
$length = array(count($arrayOfNums));
$prev = array(count($arrayOfNums));
$longestSeq = array();
$result = array();
$maxLength = 0;
$lastIndex = -1;
for ($i=0;$i<count($arrayOfNums);$i++){
    $length[$i] = 1;
    $prev[$i] = -1;
    for ($j=0;$j<$i;$j++){
        if($arrayOfNums[$j]<$arrayOfNums[$i]&& $length[$j]>=$length[$i]){
            $length[$i]=1+$length[$j];
            $prev[$i]=$j;
        }
    }
    if($length[$i]>$maxLength){
        $maxLength=$length[$i];
        $lastIndex=$i;
    }
}
for ($i=0;$i<$maxLength;$i++){
    $longestSeq[] = $arrayOfNums[$lastIndex];
    $lastIndex=$prev[$lastIndex];
}
$result = array_reverse($longestSeq);
echo implode(" ",$result);
//1 2 3 6 7 9 43