<?php
$day = trim(fgets(STDIN));
function dayOfWeek(string $day) {
    if ($day == 'Monday') return 1;
    if ($day == 'Tuesday') return 2;
    if ($day == 'Wednesday') return 3;
    if ($day == 'Thursday') return 4;
    if ($day == 'Friday') return 5;
    if ($day == 'Saturday') return 6;
    if ($day == 'Sunday') return 7;

    return "error";
}
echo dayOfWeek($day);
