<form>
    Enter cars <input type="text" name="cars" />
    <input type="submit" />
</form>
<?php
if(isset($_GET['cars'])) {
    $colors = ['yellow', 'blue', 'red', 'brown', 'black', 'blue', 'pink', 'violet', 'grey', 'white'];
    $carsString = $_GET['cars'];
    $carsArray = explode(', ', $carsString);
    unset($carsString);
    $rows = count($carsArray);
    echo "<table>\n";
    echo '<thead>
<tr>
<th>Car</th>
<th>Color</th>
<th>Count</th>
</tr>
</thead>';
    echo "<tbody>\n";
    for ($i = 0; $i < $rows; $i++) {
        $numberOfCars = strlen($carsArray[$i]);
        if ($numberOfCars >= 10) {
            $numberOfCars = 9;
        }
        echo '<tr>
<th>' . $carsArray[$i] . '</th>
<th>' . $colors[$numberOfCars] . '</th>
<th>' . $numberOfCars . '</th>
</tr>' . "\n";
    }
    echo "</tbody>\n";
    echo '</table>';
}
?>
