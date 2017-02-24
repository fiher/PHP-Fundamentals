<?php
$coordinates =explode(", ", trim(fgets(STDIN))) ;

$treasures = '';
    for ($i = 0; $i < count($coordinates); $i += 2) {
    $x = $coordinates[$i];
        $y = $coordinates[$i + 1];

        $treasures .= getTreasureLocation($x, $y);

    }

    echo trim($treasures);

    function getTreasureLocation($x ,$y) {
        echo "x = $x and y= $y\n";
        switch (true) {
            case $x >= 1 && $x <= 3 && $y >= 1 && $y <= 3:
                return "Tuvalu\n";
                break;
            case $x >= 8 && $x <= 9 && $y >= 0 && $y <= 1:
                return "Tokelau\n";
                break;
            case $x >= 5 && $x <= 7 && $y >= 3 && $y <= 6:
                return "Samoa\n";
                break;
            case $x >= 0 && $x <= 2 && $y >= 6 && $y <= 8:
                return "Tonga\n";
                break;
            case $x >= 4 && $x <= 9 && $y >= 7 && $y <= 8:
                return "Cook\n";
                break;
            default:
                return "On the bottom of the ocean\n";
        }
    }