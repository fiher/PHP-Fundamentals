<?php
$input = trim(fgets(STDIN));
$array = array_map('intval',explode(" ",$input));
$command = "";
while($command !== "print"){
    $command = trim(fgets(STDIN));
    $firstWord = explode(" ",$command)[0];
    $firstWord = trim($firstWord);
    if (trim($firstWord)==="print") {
        break;
    }
    if($firstWord==="add"){
        $index = (int)(explode(" ",$command)[1]);
        $element=(int)(explode(" ",$command)[2]);
        array_splice( $array, $index, 0, $element );
    }else if(trim($firstWord)==="addMany"){
        $arrayOfInput = explode(" ", $command);
        $index = (int)($arrayOfInput[1]);
        $element = array();
        for ($i=2;$i<count($arrayOfInput);$i++){
            $element[] = (int)($arrayOfInput[$i]);
        }
        array_splice( $array, $index, 0, $element );
        $element = array();

    }else if(trim($firstWord)==="contains"){
        $element = (int)(explode(" ",$command)[1]);
        $found = false;
        for ($i=0;$i<count($array);$i++){
            if($array[$i]==$element){
                echo $i."\n";
                $found=true;
                break;
            }
        }
        if(!$found){
          echo "-1\n";
        }

    }else if(trim($firstWord)==="remove"){
        $index = (int)(explode(" ",$command)[1]);
        array_splice( $array, $index, 1);
    }else if(trim($firstWord)==="shift"){
        $rotations = (int)(explode(" ",$command)[1]);
        for($i=0;$i<$rotations;$i++) {
            $firstElement = array_shift($array);
            $array[] = $firstElement;
        }

    }else if(trim($firstWord)==="sumPairs"){
        $isEven = count($array)%2 == 0;
        $temporaryArray = array();
        if($isEven) {
            for ($i = 0; $i < count($array); $i += 2) {
                $temporaryArray[] = $array[$i] + $array[$i + 1];
            }
        }else{
            for ($i = 0; $i < count($array)-1; $i += 2) {
                $temporaryArray[] = $array[$i] + $array[$i + 1];
            }
            $temporaryArray[] = $array[count($array)-1];
        }
        $array = $temporaryArray;
    }
}
echo "[".implode(", ",$array)."]";
#1 2 4 5 6 7
#add 1 8
#contains 1
#contains -3
#print