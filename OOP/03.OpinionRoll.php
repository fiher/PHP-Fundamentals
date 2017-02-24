<?php
class Person
{
    public $name;
    public $age;

    function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }
}
	$inputLength = trim(fgets(STDIN));
	$persons = [];
	for ($i=0; $i < $inputLength; $i++) {
        $input = trim(fgets(STDIN));
        $input = explode(' ', $input);

        $name = $input[0];
        $age = $input[1];

        if ($age > 30) {
            $person = new Person($name, $age);
            $persons[] = $person;
        }
    }

	function orderByName($a, $b) {
        return strcmp($a->name, $b->name);
    }

	usort($persons, "orderByName");
   $result = "";
	foreach ($persons as $person) {
        $result .= $person->name . ' - ' . $person->age . "\r\n";
    }
echo trim($result);
