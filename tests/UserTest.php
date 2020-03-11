<?php


use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testGetFullName()
    {

        $first_name = "first";
        $surname = "last";
        $user =  new User($first_name, $surname);

        $this->assertEquals($user->getFullName(), $first_name . ' ' . $surname);
    }
}
