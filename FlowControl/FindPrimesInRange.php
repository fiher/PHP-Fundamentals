<form>
    Start:<input type="text" name="start" />End:<input type="text" name="end"/>
    <input type="submit" />
</form>
<?php
if(isset($_GET['start'])&&isset($_GET['end'])){
    $start = $_GET['start'];
    $end = $_GET['end'];
    for($i = $start;$i<=$end;$i++){
        if(isPrime($i)){
            if($i==$end){
                echo "<b>$i</b>";
            }else {
                echo "<b>$i</b>, ";
            }
        }else{
            if($i==$end){
                echo $i;
            }else {
                echo "$i, ";
            }
        }
    }
}
function isPrime($num) {
    if($num == 1)
        return false;
    if($num == 2)
        return true;
    if($num % 2 == 0) {
        return false;
    }
    $ceil = ceil(sqrt($num));
    for($i = 3; $i <= $ceil; $i = $i + 2) {
        if($num % $i == 0)
            return false;
    }
    return true;
}
