<?php
$stringOfNums = fgets(STDIN);
$arrayOfNums = array_map('intval',explode(" ",$stringOfNums));
$resultArray = array();
$finalArray = array();
$count = 1;
$maxCount = 1;
$resultArray[] = $arrayOfNums[0];
for ($i=0; $i<count($arrayOfNums)-1;$i++){
    if($arrayOfNums[$i]==$arrayOfNums[$i+1]){
        $resultArray[] = $arrayOfNums[$i+1];
        $count++;

    }else{
        $count = 1;
        $resultArray = array();
        $resultArray[] = $arrayOfNums[$i+1];
    }
    if($count>$maxCount){
        $finalArray = array();
        $maxCount = $count;
        foreach($resultArray as $nums){
            $finalArray[] = $nums;
        }
    }
}
if($maxCount==1){
    echo $arrayOfNums[0];
}else{
    echo implode(' ',$finalArray);
}