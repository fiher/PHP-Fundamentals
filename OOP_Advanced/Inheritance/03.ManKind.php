<?php
class Human {
    private $firstName;
    private $lastName;
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLastName($lastName)
    {
        if(ctype_upper ($lastName[0] )) {
            if(strlen($lastName)>=3){
                $this->lastName = $lastName;
            }else{
                throw new Exception("Expected length at least 3 symbols!Argument: lastName");
            }
        }else{
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
    }
    public function setFirstName($firstName)
    {
        if(ctype_upper ($firstName[0] )) {
            if(strlen($firstName)>3){
                $this->firstName = $firstName;
            }else{
                throw new Exception("Expected length at least 4 symbols!Argument: firstName");
            }
        }else{
            throw new Exception("Expected upper case letter!Argument: firstName");
        }
    }
    public function __construct($firstName,$lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

}
class Student extends Human{
    private $facultyNumber;
    public function getFacultyNumber()
    {
        return $this->facultyNumber;
    }
    public function setFacultyNumber($facultyNumber)
    {
        if(strlen($facultyNumber)>=5&&strlen($facultyNumber)<=10){
            $this->facultyNumber = $facultyNumber;
        }else{
            throw new Exception("Invalid faculty number!");
        }

    }
    public function __construct($firstName, $lastName,$facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }
}
class Worker extends Human{
    public $weekSalary;
    public $hoursPerDay;
    public $salaryPerHour;
    public function getHoursPerDay()
    {
        return sprintf('%0.2f',$this->hoursPerDay);
    }
    public function setHoursPerDay($hoursPerDay)
    {
        if($hoursPerDay>=1 && $hoursPerDay<=12){
            $this->hoursPerDay = $hoursPerDay;
        }else{
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }

    }
    public function getSalaryPerHour()
    {
        return sprintf('%0.2f',$this->salaryPerHour);
    }
    public function setSalaryPerHour($weekSalary,$hoursPerDay)
    {
        $this->salaryPerHour = $weekSalary/($hoursPerDay*7);
    }
    public function getWeekSalary()
    {
        return sprintf('%0.2f',$this->weekSalary);
    }
    public function setWeekSalary($weekSalary)
    {
        if($weekSalary>10){
            $this->weekSalary = $weekSalary;
        }else{
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }

    }
    public function __construct($firstName, $lastName,$weekSalary,$hoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setWeekSalary($weekSalary);
        $this->setHoursPerDay($hoursPerDay);
        $this->setSalaryPerHour($weekSalary,$hoursPerDay);
        if(strlen($lastName)<3){
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }

    }
}
$studentInfo = explode(" ",trim(fgets(STDIN)));
$workerInfo = explode(" ",trim(fgets(STDIN)));
$student;
$worker;
$exception = false;
try{
    $student = new Student($studentInfo[0],$studentInfo[1],$studentInfo[2]);
    $worker = new Worker($workerInfo[0],$workerInfo[1],$workerInfo[2],$workerInfo[3]);
}catch (Exception $e) {
    $exception = true;
    echo $e->getMessage();
}
if(!$exception){

    $result = 'First Name: '.$student->getFirstName()."\n";
    $result .= "Last Name: ".$student->getLastName()."\n";
    $result .= "Faculty number: ".$student->getFacultyNumber()."\n\n";
    $result .= 'First Name: '.$worker->getFirstName()."\n";
    $result .= "Last Name: ".$worker->getLastName()."\n";
    $result .= "Week Salary: ".$worker->getWeekSalary()."\n";
    $result .= "Hours per day: ".$worker->getHoursPerDay()."\n";
    $result .= "Salary per hour: ".$worker->getSalaryPerHour();
    echo $result;
}