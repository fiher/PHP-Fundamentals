<?php
$num = (int)(trim(fgets(STDIN)));
$dnaArray = [
    'A', 'T', 'C', 'G', 'T', 'T', 'A', 'G', 'G', 'G', 'A', 'T', 'C', 'G', 'T', 'T', 'A', 'G', 'G','G'];
$result = "";
$dnaArrayCount =0;
for ($i=0;$i<$num;$i++){
    if($dnaArrayCount>=20){
        $dnaArrayCount = $dnaArrayCount%20;
    }
    $n =$i;
    if($n>=4){
        $n = $n %4;
    }
    if($n==0){
        $result .= "**".$dnaArray[$dnaArrayCount].$dnaArray[$dnaArrayCount+1]."**\n";
    }
    if($n==1||$n==3){
        $result .= "*".$dnaArray[$dnaArrayCount]."--".$dnaArray[$dnaArrayCount+1]."*\n";
    }
    if($n==2){
        $result .= $dnaArray[$dnaArrayCount]."----".$dnaArray[$dnaArrayCount+1]."\n";
    }
    $dnaArrayCount+=2;
}
echo trim($result);
//**AT**
//*C--G*
//T----T
//*A--G*
//**GG**
//*A--T*
//C----G
//*T--T*
//**AG**
//*G--G*