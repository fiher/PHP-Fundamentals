<?php
$n = (int)(trim(fgets(STDIN)));
$commands = explode(", ",trim(fgets(STDIN)));
$result = "";
    for($i = 0 ;$i <count($commands);$i++){
    if($commands[$i]== "chop"){
        $n = $n/2;
        $result.= $n."\n";
    }
    else if ($commands[$i]=="dice"){
        $n = sqrt($n);
        $result.=$n."\n";
    }
    else if ($commands[$i]== "spice"){
        $n++;
        $result .=$n."\n";
    }
    else if($commands[$i]=="bake"){
        $n= $n*3;
        $result.=$n."\n";
    }
    else if($commands[$i]=="fillet"){
        $n = $n*0.80;
        $result .=$n."\n";
    }
}
echo trim($result);