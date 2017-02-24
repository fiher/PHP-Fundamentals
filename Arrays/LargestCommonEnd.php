<?php
$firstString = fgets(STDIN);
$secondString = fgets(STDIN);
$firstArr = explode(" ",$firstString);
$secondArr = explode(" ",$secondString);
$firstCount = count($firstArr);
$secondCount = count($secondArr);
$shorter = min($firstCount,$secondCount);
$leftCounter = 0;
$rightCounter = 0;
for ($i= 0;$i<$shorter;$i++){
    if($firstArr[$i]==$secondArr[$i]){
        $leftCounter++;
    }else{
        break;
    }
}
for ($i= 1;$i<=$shorter;$i++){
    if($firstArr[$firstCount-$i]==$secondArr[$secondCount-$i]){
        $rightCounter++;
    }else{
        break;
    }
}
if($leftCounter>$rightCounter){
    echo $leftCounter;
}else{
    echo $rightCounter;
}
#I love programming
#Learn Java or C#

