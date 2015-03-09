<?php
class BasicArray implements Iterator
{
    private $position = 0;
    private $array = array("first", "second", "third"); 
                // Fixed Error in the book wrong array declaration

    public function __construct()
    {
        $this->position = 0;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->array[$this->position]; // missing semi-colon
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position += 1;
    }

    public function valid()
    {
        return isset($this->array[$this->position]);
    } 
}

$basicArray = new BasicArray;

foreach ($basicArray as $value) {
    echo "{$value}<br>";
}
echo "<br>";
foreach ($basicArray as $key => $value) {
    echo "{$key} => {$value}<br>";
}


?>