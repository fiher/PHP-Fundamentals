<?php
    $input = explode(", ",trim(fgets(STDIN)));
    $targetSize = $input[0];
    for ($i = 1; $i < count($input); $i++) {
        $size = $input[$i];
        if($i==1) {
            echo "Processing chunk $size microns\n";
        }else{
            echo "\nProcessing chunk $size microns\n";
        }
        $operation = "Cut";
        $times = 0;
        $cutSize = cut($size);
        while ($cutSize >= $targetSize || (int)($targetSize - $cutSize) == 1) {
            $size = $cutSize;
            $cutSize = cut($size);
            $times++;
        }
        if ($times > 0) {
            echo "$operation x$times\n";
            $size = wash($size);
            $times = 0;
        }
        $operation = "Lap";
        $lapSize = lap($size);
        while ($lapSize >= $targetSize || (int)($targetSize - $lapSize) == 1) {
            $size = lap($size);
            $lapSize = lap($size);
            $times++;
            if($lapSize<=$targetSize){
                break;
            }
        }
        if ($times > 0) {
            echo "$operation x$times\n";
            $size = wash($size);
            $times = 0;
        }
        $operation = 'Grind';
        $grindSize = grind($size);
        while ($grindSize >= $targetSize || (int)($targetSize - $grindSize) == 1) {
            $size = grind($size);
            $grindSize = grind($size);
            $times++;
        }
        if ($times > 0) {
            echo"$operation x$times\n";
            $size = wash($size);
            $times = 0;
        }
        $operation = 'Etch';
        $etchSize = etch($size);
        while ($etchSize >= $targetSize || (int)($targetSize - $etchSize) == 1) {
            $size = etch($size);
            $etchSize = etch($size);
            $times++;
        }
        if ($times > 0) {
            echo "$operation x$times\n";
            $size = wash($size);
            $times = 0;
        }
        if ((int)(($targetSize - $size == 1))) {
            $size = xRay($size);
            echo "X-ray x1\n";
        }
        echo"Finished crystal $targetSize microns";
    }
    function wash($size) {
        echo "Transporting and washing\n";
        return floor($size);
    }

    function xRay($size) {
        return $size + 1;
    }

    function etch($size) {
        return $size - 2;
    }

    function grind($size) {
        return $size - 20;
    }

    function lap($size) {
        return $size * 0.8;
    }

    function cut($size) {
        return $size / 4;
    }
