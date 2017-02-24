<html>
<head>
    <style type="text/css">
        ol
        {
            list-style-type: none;
            counter-reset: custom -1;
        }
        ol li:before
        {
            content: counter(custom) ": ";
            counter-increment: custom;
        }
    }
    </style>
</head>
<body>
<form>
<label>Enter Tags</label>
    <br>
    <input type="text" name="input">
    <input type="submit" value="Submit">
</form>

<?php
if(isset($_GET['input'])){
    $tags = explode(", ",$_GET['input']);
    //$tags = explode(", ","Pesho, homework, homework, exam, course, PHP");
    echo "<ol>\n";
    for ($i =0; $i<count($tags);$i++){
        echo "<li>$tags[$i]</li>\n";
    }
    echo "</ol>";
}
?>
</body>
</html>
