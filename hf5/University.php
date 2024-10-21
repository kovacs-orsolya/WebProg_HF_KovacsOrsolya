<?php
class University extends AbstractUniversity
{
    public function addSubject(string $code, string $name): Subject
    {
        if (!$this->isSubjectExists($code)) {
            $subject = new Subject($code, $name);
            array_push($this->subjects, $subject);
            return $subject;
        }
        throw new Exception("Subject already exists!");
    }
    public function deleteSubject(Subject $subject)
    {
        foreach($this->subjects as $key => $value){
            if ($value->getCode() == $subject->getCode()) {
                if(count($value->getStudents()) == 0){
                    unset($this->value[$key]);
                    return true;
                }else{
                    throw new Exception("This subject has students!");
                }
            }
        }
        return false;
    }

    public function addStudentOnSubject(string $subjectCode, Student $student)
    {
        foreach ($this->subjects as $subject) 
        {
            if ($subject->getCode() === $subjectCode) {
                $subject->addStudent($student->getName(), $student->getStudentNumber());
                return $subject;
            }
        }   
        throw new Exception("Stubject doesn't exist!");
    }
    
    public function getStudentsForSubject(string $subjectCode)
    {
        foreach ($this->subjects as $subject) {
        
            if ($subject->getCode() === $subjectCode) {
                return $subject->getStudents();
            }   
        }
        return [];
    }
    public function getNumberOfStudents(): int
    {
        $sum = 0;
        foreach ($this->subjects as $subject) 
        {
            $sum += count($subject->getStudents());
        }
        return $sum;
    }

    public function print()
    {
        foreach ($this->subjects as $subject) {
            
            echo "{$subject->getName()}<br>";
            echo "-------------------------<br>";
            foreach ($subject->getStudents() as $student) 
            {
            
                echo $student->getName()." ".$student->getStudentNumber()."<br>";
            }
            echo"<br>";
        }
    }
    private function isSubjectExists($code)
    {
        if (count($this->subjects) == 0) return false;
        foreach ($this->subjects as $subject) 
        {
            if ($subject->getCode()== $code) {
                return true;
            }
        }
        return false;
    }
}

?>