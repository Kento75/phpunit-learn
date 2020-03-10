<?php

use \PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAddingTwoPlusTwoResultsInFour()
    {
        require 'functions.php';

        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(7, add(5, 2));
    }
}