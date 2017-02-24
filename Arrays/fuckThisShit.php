<?php
$command = fgets(STDIN);
var_dump($command);
if (strcmp($command, "print") !== 0) {
    echo 'why';
}
while(true){
    if($command=="print"){
        echo "why";
        break;
    }
}
echo "this works but the other one doesnot";