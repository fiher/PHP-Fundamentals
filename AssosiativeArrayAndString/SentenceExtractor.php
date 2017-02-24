<?php
$text = trim(fgets(STDIN));
$banned = trim(fgets(STDIN));
$regex = '/(?<=[,m.!?]|[.!?])\s+(?=\S)/';
$sentences = preg_split($regex, $text, -1, PREG_SPLIT_NO_EMPTY);
$echo = '';
foreach($sentences as $sentence){
    if(isSentence($sentence)) {
        $regex = "/[^\w]*([\s]+[^\w]*|$)/";
        $words = preg_split($regex, $sentence, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($words as $word) {
            if ($word == $banned) {
                $echo .= $sentence . "\n";
            }
        }
    }
}
$echo = trim($echo);
echo $echo;
function isSentence($sentence){
    $len = strlen($sentence);
    if($sentence[$len-1]== "!"|| $sentence[$len-1]== "?" || $sentence[$len-1] == "."){
        return true;
    }
    else{
        return false;
    }
}