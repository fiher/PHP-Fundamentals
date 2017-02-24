<?php
class Person
{
    private $name;
    private $age;
    private $occupation;
    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }
    public function getAge(): int
    {
        return $this->age;
    }
    public function __toString(): string
    {
        return "{$this->name} - age: {$this->age}, occupation: {$this->occupation}";
    }
}
$people = [];
while (true) {
    $tokens = explode(" ", trim(fgets(STDIN)));
    if ($tokens[0] === "END") {
        break;
    }
    $people[] = new Person($tokens[0], intval($tokens[1]), $tokens[2]);
}
usort($people, function (Person $p1, Person $p2) {
    return $p1->getAge() <=> $p2->getAge();
});
echo implode(PHP_EOL, $people);
while (true) {
    $tokens = explode(" ", trim(fgets(STDIN)));
    if ($tokens[0] === "END") {
        break;
    }
    $people[] = new Person($tokens[0], intval($tokens[1]), $tokens[2]);
}
usort($people, function (Person $p1, Person $p2) {
    return $p1->getAge() <=> $p2->getAge();
});
echo implode(PHP_EOL, $people);