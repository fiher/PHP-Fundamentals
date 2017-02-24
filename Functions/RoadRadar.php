<?php
     $speed = (int)(trim(fgets(STDIN)));
     $zone = trim(fgets(STDIN));
function getLimit($zone) {
    switch ($zone) {
        case "motorway":
            $speedLimit = 130;
            break;
        case "interstate":
            $speedLimit = 90;
            break;
        case "city":
            $speedLimit = 50;
            break;
        case "residential":
            $speedLimit = 20;
            break;
        default:
            echo "Not a Valid Input";
            $speedLimit = 1000;
    }
    return $speedLimit;
}
function getInfraction($speed, $limit) {
    $overSpeed = $speed - $limit;
    if ($overSpeed < 0) {
        $result = false;
    } else {
        //TODO: when screenshoting i have to leave a TODO here
        $result = true;
    }
    return $result;
}
$limit = getLimit($zone);
$infraction = getInfraction($speed, $limit);
$overSpeed = $speed-$limit;
if ($infraction) {
    if($overSpeed<=20){
        echo "speeding";
    }else if($overSpeed<=40){
        echo "excessive speeding";
    }else{
        echo "reckless driving";
    }
}