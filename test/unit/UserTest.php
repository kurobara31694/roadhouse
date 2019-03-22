<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    public function testUsername()
    {
        // Because all our PHP files for the app
        // are under app.
        $user = new \App\Models\User;

        // Testing with sample name
        $user->setUsername('jojo222');

        $this->assertEquals($user->getUsername(), 'jojo222');

    }


    public function testCalc(){

        $fuelCalc = new \App\Models\FuelCalc;
        
        // Number of Gallons
        $fuelCalc->setNumGallons('13');

        $this->assertEquals($fuelCalc->getNumGallons(), '13');


        // Selecting Month
        $fuelCalc->setMonth('1');

        $this->assertEquals($fuelCalc->getMonth(), '1');


        // Selecting Day
        $fuelCalc->setDay('24');

        $this->assertEquals($fuelCalc->getDay(), '24');


        // Selecting Year
        $fuelCalc->setYear('2008');

        $this->assertEquals($fuelCalc->getYear(), '2008');

    }   
}
