<?php

class Student
{
    private string $studentNumber;
    private string $name;
    private array $grades;

    public function __construct(string $studentNumber, string $name)
    {
        $this->studentNumber = $studentNumber;
        $this->name = $name;
        $this->grades = [];
    }
    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function __toString(): string
    {
        return $this->studentNumber ." ". $this->name;
    }
    public function setStudentNumber(string $studentNumber)
    {
        $this->studentNumber = $studentNumber;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function addGrade(string $subjectCode, float $grade)
    {
        $this->grades[$subjectCode] = $grade;
    }
    public function getAvgGrade()
    {
        $sum = 0;
        foreach($this->grades as $key => $grade){
            $sum += $grade;
        }
        return $sum/count($this->grades);
    }
    public function printGrades()
    {
        foreach( $this->grades as $key => $grade )
        {
            echo  "$key - $grade<br>";
        }
    }

}


?>