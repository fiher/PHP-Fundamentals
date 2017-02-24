<?php
$x = trim(fgets(STDIN));
function inverse($x) {
    if ( ! is_numeric($x)) {
        throw new Exception('Wrong type');
    } else if ($x == 0) {
        throw new Exception('Division by zero.');
    }
    return 1;
}
try {
    echo inverse($x) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}