<?php
$coordinates = explode(", ",trim(fgets(STDIN)));
$x1 = $coordinates[0];
$y1 = $coordinates[1];
$x2 = $coordinates[2];
$y2 = $coordinates[3];
$x3 = $coordinates[4];
$y3 = $coordinates[5];
$p1p2 = calc2dDistance($x1, $y1, $x2, $y2);
    $p1p3 = calc2dDistance($x1, $y1, $x3, $y3);
    $p2p3 = calc2dDistance($x2, $y2, $x3, $y3);
    $output = '';
    $length = 0;
    if ($p1p2 <= $p1p3 && $p1p2 <= $p2p3) {
        if ($p1p3 <= $p2p3) {
            $p =$p1p2+$p1p3;
            echo "2->1->3: $p";
        } else {
            $p =$p1p2+$p2p3;
            echo "1->2->3: $p";
        }
    } else if ($p1p3 <= $p1p2 && $p1p3 <= $p2p3) {
        if ($p1p2 <= $p2p3) {
            $p =$p1p2+$p1p3;
            echo "2->1->3: $p";
        } else {
            $p=$p1p3+$p2p3;
            echo "1->3->2: $p";
        }
    } else {
        if ($p1p2 <= $p1p3) {
            $p=$p1p2+$p2p3;
            echo "1->2->3: $p";
        } else {
            $p=$p1p3+$p2p3;
            echo "1->3->2: $p";
        }
    }

    function calc2dDistance($x1, $y1, $x2, $y2) {
        return sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    }
