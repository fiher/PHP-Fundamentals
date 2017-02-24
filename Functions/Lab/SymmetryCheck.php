<?php
$str = trim(fgets(STDIN));
function isPalindrome($str) {
    for ($i = 0; $i < strlen($str) / 2; $i++)
        if ($str[$i] != $str[strlen($str) - $i - 1])
            return false;
    return true;
}
if(isPalindrome($str)){
    echo "true";
}else{
    echo "false";
}