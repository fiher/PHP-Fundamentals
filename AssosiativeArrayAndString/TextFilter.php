<?php
$text = trim(fgets(STDIN));
$banned = explode(', ',trim(fgets(STDIN)));
foreach($banned as $word){
    $count = strlen($word);
    $string = str_repeat('*',$count);
    $text = str_replace($word,$string,$text);
}
echo $text;