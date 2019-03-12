<?php

class sampleTest extends \PHPUnit\Framework\TestCase
{
    public function testTrueAssertsToTrue()
    {
        $this->assertTrue(true);
        // Assert means something matches an acceptable value.
        // Here, we are asserting that true is true. 
        // If we put in false, test case will fail.
    }
        
}