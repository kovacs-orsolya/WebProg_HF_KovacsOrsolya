<?php
class ArrayManipulator
{
    private array $data = [];

    public function __construct($array)
    {
        $this->data = $array;
    }
   
    public function __get (string $key) 
    {
        return $this->data [ $key ] ?? "$key not found";
    }
    public function __set($key, $value):void
    {
        $this->data[$key] = $value;
    }
    public function __isset($key):bool
    {
        return isset($this->data[$key]);
    }
    public function __unset($key):void
    {
        unset($this->data[$key]);
    }
    public function __clone():void
    {
        $this->data = [];

    }
    public function __tostring()
    {
        return implode(', ',$this->data);
    }

}

$manipulator = new ArrayManipulator(['first' => 'apple', 'second' => 'banana']);


echo "First element: " . $manipulator->first; 
echo "<br>";

$manipulator->third = 'cherry';
echo "Added third element: " . $manipulator->third; 
echo "<br>";

echo "Is 'second' set? " . (isset($manipulator->second) ? 'Yes' : 'No'); // Yes
echo "<br>";

unset($manipulator->second);
echo "Is 'second' set after unset? " . (isset($manipulator->second) ? 'Yes' : 'No'); // No
echo "<br>";

echo "Array as string: " . $manipulator; 
echo "<br>";

$clonedManipulator = clone $manipulator;
$clonedManipulator->third = 'grape';
echo "Cloned and modified array: " . $clonedManipulator;
echo "<br>";
echo "Original array remains unchanged: " . $manipulator;
echo "<br>";


?>
