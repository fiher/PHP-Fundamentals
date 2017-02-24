<form>
    Enter number of years<input type="text" name="years" />
    <input type="submit" />
</form>
<?php

if(isset($_GET['years'])){
    $years = $_GET['years'];
    $startYear = 2014;
    echo '<table border="2">';
    echo '<thead>
<tr>
<th>Year</th>
<th>January</th>
<th>February</th>
<th>March</th>
<th>April</th>
<th>May</th>
<th>June</th>
<th>July</th>
<th>August</th>
<th>September</th>
<th>Oktober</th>
<th>November</th>
<th>December</th>
<th>Total:</th>
</tr>
</thead>';
    for($i = 0; $i<$years;$i++){
        $total = 0;
        $startYear -=$i;
        echo "<tr>";
        echo "<td>$startYear</td>";
        for ($k=1;$k<=12;$k++){
            $expenses = rand(1,999);
            $total+=$expenses;
            echo "<td>$expenses</td>";
        }
        echo "<td>$total</td>";
        echo "</tr>";
    }
}