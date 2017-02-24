<?php
$alphabet = "a b c d e f g h i j k l m n o p q r s t u v w x y z";
$alphabetArray = explode(' ',$alphabet);
unset($alphabet);
$input = fgets(STDIN);
$input = trim(strtolower($input));
$last = "";
for ($i=0;$i<strlen($input)-1;$i++){
    $index = array_search($input[$i],$alphabetArray);
    if($i==strlen($input)-2){
        $last=array_search($input[$i+1],$alphabetArray);
    }
    echo "$input[$i] -> $index\n";
}
echo "$input[$i] -> $last";