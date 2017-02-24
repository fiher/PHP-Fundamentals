<?php
$num = $_GET['number'];
if($num<100){
    echo "no";
}else{
    for ($i = 100 ; $i<=$num;$i++){
        if($i >999){
            break;
        }
        $number = $i;
        $digit3 = $number%10;
        $number = $number/10;
        $digit2 =  $number%10;
        $number = $number/10;
        $digit1 = $number%10;
        if(!($digit1 == $digit2 || $digit1==$digit2 || $digit1 == $digit3 || $digit2 == $digit3)){
            echo "$i, ";
        }
    }
}