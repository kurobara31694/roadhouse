<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    public function testUsername()
    {
        // Because all our PHP files for the app
        // are under app.
        $user = new \App\Models\User;

        // Testing with sameple name
        $user->setUsername('jojo222');

        $this->assertEquals($user->getUsername(), 'jojo222');

        
    }
}

