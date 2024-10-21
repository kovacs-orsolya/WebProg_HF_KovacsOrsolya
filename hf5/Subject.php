<?php

class Subject
{
    private string $code;
    private string $name;
    private array $students = [];

    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;

    }
    public function getCode()
    {
        return $this->code;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getStudents()
    {
        return $this->students;
    }
    public function __toString()
    {
        return $this->name;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setStudents(array $students)
    {
        $this->students = $students;
    }
    public function addStudent($name, $studentNumber)
    {
       
        if (!$this->isStudentExists($studentNumber)) {
            $student =  new Student($studentNumber,$name);
            array_push( $this->students, $student);
            return $student;
        }else{
            throw new Exception("Student already exists!");
        }
    }
    public function deleteStudent(string $studentNumber)
    {
       
        if (!$this->isStudentExists($studentNumber)) {
            foreach($this->students as $key => $student){
                if ($student->getId() == $studentNumber) {
                    unset($this->students[$key]);
                    count($this->students);
                    return true;
                }
            }
        }else{
            throw new Exception("Student doesn't exists!");
        }
        return false;
    }
    private function isStudentExists($studentNumber)
    {
        //return in_array($studentNumber, $this->students);
        if (count($this->students) == 0) return false;
        foreach ($this->students as $student) 
        {
            if ($student->getName() == $studentNumber) {
                return true;
            }
        }
        return false;
    }
}



?>