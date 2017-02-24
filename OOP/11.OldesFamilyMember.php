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
class Family extends Person{
    public $familyMembers;
    function __construct($name,$age){
        $this->familyMembers[] = new Person($name,$age);
    }
    function AddMember($name,$age){
        $this->familyMembers[] = new Person($name,$age);
    }
    function getOldestMember(){
        $family =$this->familyMembers;
        $oldest = PHP_INT_MIN;
        $oldestName = '';
        foreach ($family as $member){
            if($member->age >$oldest){
                $oldest = $member->age;
                $oldestName = $member->name;
            }
        }
        $string = $oldestName." ".$oldest;
        return $string;
    }
}
$numberOfMembers = trim(fgets(STDIN));
$family = null;
for($i = 0;$i<$numberOfMembers;$i++){
    $person = explode(" ",trim(fgets(STDIN)));
    $name =  $person[0];
    $age = $person[1];
    if($i==0) {
        $family = new Family($name, $age);
    }else{
        $family->AddMember($name,$age);
    }
}
echo $family->getOldestMember();
