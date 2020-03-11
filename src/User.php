<?php


class User
{
    private $first_name;

    private $surname;

    public function __construct($first_name, $surname)
    {
        $this->surname = $surname;
        $this->first_name = $first_name;
    }

    public function getFullName()
    {
        return "{$this->first_name} {$this->surname}";
    }
}
