<?php 
class Number{
    public int $value;
    public string $file_name;

    public function __construct($value, $file_name)
    {
        $this->value = $value;
        $this->file_name = $file_name;
    }
}