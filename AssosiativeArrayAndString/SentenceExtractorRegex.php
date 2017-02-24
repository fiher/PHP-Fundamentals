<?php
$text = trim(fgets(STDIN));
$banned = trim(fgets(STDIN));
//$regex = '[^.?!]*(?<=[.?\s!])is(?=[\s.?!])[^.?!]*[.?!]/';
//$sentences = preg_match_all($regex, $text, -1, PREG_SPLIT_NO_EMPTY);
//var_dump($sentences);
$result = '';
$text = "___ ".$text;
$matches = array();
preg_match_all('/[^.?!]*(?<=[.?\s!])'.$banned.'(?=[\s.?!])[^.?!]*[.?!]/',$text, $matches);
foreach($matches as $match){
    foreach ($match as $sentence)
        //$sentence = trim($sentence);
    $result .= trim(str_replace("___ ", '',$sentence))."\n";
}
$result = trim($result);
echo $result;