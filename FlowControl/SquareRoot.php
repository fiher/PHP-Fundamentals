
<?php
$total = 0;
echo  "<table border='2'>\n";
echo  "<thead>\n";
echo  "<tr>\n<th>Number</th>\n<th>Square</th>\n</tr>\n";
echo  "</thead>\n";
echo  "<tbody>\n";
for ($i = 0 ; $i<=100; $i+=2){
    $array[] = $i;
    $total += sqrt($i);
    echo "<tr>\n<td>".$i."</td>\n<td>".round(sqrt($i),2)."</td>\n</tr>\n";
}
   echo "<tr>\n<td>Total</td>\n<td>".round($total,2)."</td>\n</tr>\n";
   echo "</tbody>\n";
   echo "</table>";

