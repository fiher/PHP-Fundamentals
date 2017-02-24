<?php
echo str_replace('">',']',str_replace('</a>',"[/URL]",str_replace('<a href="',"[URL=",trim(fgets(STDIN)))));
// here is more understandable version
//$text = trim(fgets(STDIN));
//$text = str_replace('<a href="',"[URL=",$text);
//$text = str_replace('</a>',"[/URL]",$text);
//$text = str_replace('">',']',$text);
//echo $text;