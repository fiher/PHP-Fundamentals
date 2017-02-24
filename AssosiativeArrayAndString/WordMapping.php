<form>
    <input type="text" name="input" />
    <input type="submit" />
    </form>
<?php
//if(isset($_GET['input'])) {
    $str = "Ha sega da va vida kak broite ha ha ha ha Ha i dali ignorirate chislata haHa";
    //$str = trim($_GET['input']);
    $str = trim(preg_replace("/[^a-z]+/i", " ", $str));
    $str = strtolower($str);//  abv   "0 abv 0"
# REGEX explained
#/      Denotes start of pattern
#[      Denotes start of character class
# ^     Not, or negative
# a-z   Letters a through z (Or, "Not a letter or number" because of ^0-9
#]      Denotes end of character class
#+      Matches 1 or more instances of the character class match
#/      Denotes end of pattern
#i      Case-insensitive, a-z also means A-Z
    $arrayOfStrings = explode(" ", $str);
    $countOfAppearance = array();
    for ($i = 0; $i < count($arrayOfStrings); $i++) {
        if (isset($countOfAppearance[$arrayOfStrings[$i]])){//array_key_exists($arrayOfStrings[$i], $countOfAppearance)) {
            //$occurrence = $countOfAppearance[$arrayOfStrings[$i]];
            //$occurrence += 1;
            //$countOfAppearance[$arrayOfStrings[$i]] = $occurrence;
            $countOfAppearance[$arrayOfStrings[$i]]++;
        } else {
            //$temparr = array($arrayOfStrings[$i] => 1);
            //$countOfAppearance = array_merge($countOfAppearance, $temparr);
            $countOfAppearance[$arrayOfStrings[$i]] = 1;
        }
    }
    echo "<table border='2'>";
    foreach ($countOfAppearance as $key => $val){
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td>$val</td>";
        echo"</tr>";
    }
    echo"</table>";
//}