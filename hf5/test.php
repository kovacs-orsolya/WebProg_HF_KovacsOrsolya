<?php

include "loader.php";
function rendezes(array $studArray) : array
{   
    usort($studArray, function ($a, $b) {
        return $a->getAvgGrade() <=> $b->getAvgGrade();
    });
    return $studArray;
}

try
{
    $university=new University();
    $university->addSubject("1","English");
    $subject = new Subject("2","Chemistry");
    $university->addSubject($subject->getCode(),$subject->getName());
    $student = new Student("1","Pista");
    $student->addGrade("1",7);
    $student->addGrade("2",7);
    $university->addStudentOnSubject("1",$student);
    $university->print();
    echo"<br>------------------------<br>";
    $students=[];
    array_push($students,$student);
    array_push($students, new Student("2","Anna"));
    array_push($students, new Student("3","Peter"));
    $students[1]->addGrade("1",6);
    $students[1]->addGrade("2",7);
    $students[2]->addGrade("1",6);
    $students[2]->addGrade("2",9);
    echo $student;
    echo "<br>";
    $student->printGrades();
    echo "<br>";
    print_r(rendezes($students));
}catch(Exception $e)
{
    echo $e->getMessage() ."<br>";
}


?>