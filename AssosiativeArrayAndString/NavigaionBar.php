<form>
    Categories: <input type="text" name="categories"/><br>
    Tags: <input type="text" name="tags"/><br>
    Months: <input type="text" name="months"/><br>
    <input type="submit" value="Generate"/>
</form>
<?php
if(isset($_GET['categories'])&&isset($_GET['tags'])&&isset($_GET['months'])){
    $categories =$_GET['categories'];
    $categories = explode(', ',$categories);
    $tags = $_GET['tags'];
    $tags = explode(', ',$tags);
    $months = $_GET['months'];
    $months = explode(', ',$months);
    echo "<h2>Categories</h2>";
    echo "<ul>";
foreach ($categories as $category) {
    echo "<li>$category</li>";
}
    echo "</ul>";
    echo "<h2>Tags</h2>";
    echo "<ul>";
foreach ($tags as $tag) {
    echo "<li>$tag</li>";
}
    echo "</ul>";
    echo "<h2>Months</h2>";
    echo "<ul>";
foreach ($months as $month) {
    echo "<li>$month</li>";
}
    echo "</ul>";
}