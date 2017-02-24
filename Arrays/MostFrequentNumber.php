
<?php
$input = trim(fgets(STDIN));
$arrayOfNums = array_map('intval',explode(" ",$input));
$max = 0;
$max_item = $arrayOfNums[0];

$counts = array_count_values($arrayOfNums);
foreach ($counts as $value => $amount) {
if ($amount > $max) {
$max = $amount;
$max_item = $value;
}
}
echo $max_item;
#1 2 3 1 2 3 1 2 3 1 2 3 1 2 3 3 3 3 1 1 1 3 1 3 1 3 1 3 3 1
#12
#5
#