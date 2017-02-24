<?php
$variable = $_GET["var"];
if ( gettype($variable) == 'integer' || gettype($variable) == 'double' || gettype($variable) == 'float'){
    var_dump($variable);
}else{
    echo gettype($variable);
}