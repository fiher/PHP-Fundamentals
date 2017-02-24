<form>
    <input type="text" name="input">
    <input type="submit">
</form>
<?php
if (isset($_GET['input'])){
    $string = $_GET['input'];
    $string = preg_replace('/\s+/', '', $string);
    $len = strlen($string);
    for($i=0;$i<$len;$i++) {
        $word = $string[$i];
        $asciCode = ord($word);
        if ($asciCode % 2 == 0) {
            echo "<font color='red'>$word </font>";
        } else {
            echo "<font color='blue'>$word </font>";
        }
    }
}
