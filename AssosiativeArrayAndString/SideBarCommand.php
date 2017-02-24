<?php
$categories = "this, 24345is, going";
$categories = explode(', ',$categories);
$tags = "23to39, be239, really, 394hard";
$tags = explode(', ',$tags);
$months = "dont, 2938!!!, ki#(#l, me@(, please@(@";
$months = explode(', ',$months);
echo "<h2>Categories</h2>";
//echo "<hr>";
echo "<ul>";
foreach ($categories as $category) {
    echo "<li>$category</li>";
}
echo "</ul>";
//echo "<hr>";
echo "<h2>Tags</h2>";
echo "<ul>";
foreach ($tags as $tag) {
    echo "<li>$tag</li>";
}
echo "</ul>";
//echo "<hr>";
echo "<h2>Months</h2>";
echo "<ul>";
foreach ($months as $month) {
    echo "<li>$month</li>";
}
echo "</ul>";