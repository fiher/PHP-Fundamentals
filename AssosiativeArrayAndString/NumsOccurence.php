<?php
 $nums =  trim(fgets(STDIN));
    $arrayOfNums = explode(" ", $nums);
    $countOfAppearance = array();
    for ($i = 0; $i < count($arrayOfNums); $i++) {
        if (isset($countOfAppearance[$arrayOfNums[$i]])){
            $countOfAppearance[$arrayOfNums[$i]]++;
        } else {
            $countOfAppearance[$arrayOfNums[$i]] = 1;
        }
    }
   ksort($countOfAppearance);
    $len = count($countOfAppearance);
    for ($i=0; $i< $len-1;$i++){
       $key = key($countOfAppearance);
        $val = $countOfAppearance[$key];
        echo "$key -> $val times\n";
        next($countOfAppearance);
    }
        end($countOfAppearance);
        $key = key($countOfAppearance);
        echo "$key -> $countOfAppearance[$key] times";