<?php

class UserTest extends \PHPUnit\Framework\TestCase
{

    public function testLogin()
    {
        // Because all our PHP files for the app
        // are under app.
        $user = new \App\Models\User;

        // Testing with sample name
        $user->setUsername('jojo222');

        $this->assertEquals($user->getUsername(), 'jojo222');
        
        $user->setPass('1234');

        $this->assertEquals($user->getPass(), '1234');

    }

    public function testRegister()
    {
        // Because all our PHP files for the app
        // are under app.
        $reg = new \App\Models\User;

        // Testing with sample name
        $reg->setUsername('jojo222');

        $this->assertEquals($reg->getUsername(), 'jojo222');
        
        //copying code to try to run test for upodated userclass...potato
        $reg->setFullname('john bob');

        $this->assertEquals($reg->getFullname(), 'john bob');

        $reg->setPass('1234');

        $this->assertEquals($reg->getPass(), '1234');//should actually not be this but w/e

        $reg->setState('TX');

        $this->assertEquals($reg->getState(), 'TX');

        $reg->setZip('777');

        $this->assertEquals($reg->getZip(), '777');

        $reg->setAdd('123 sesame street');

        $this->assertEquals($reg->getAdd(), '123 sesame street');



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
