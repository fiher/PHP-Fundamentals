<?php
    $string = "!@#$%^!@#$%^@#$%^!@#$%^qwertyuioasdfghjkzxcvbnm";
    $string = preg_replace('/\s+/', '', $string);
    for($i=0;$i<strlen($string);$i++) {
        $word = $string[$i];
        $asciCode = ord($word);
        if ($asciCode % 2 == 0) {
            echo "<font color='red'>$word </font>";
        } else {
            echo "<font color='blue'>$word </font>";
        }
    }
