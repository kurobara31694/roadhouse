<?php

class userTest extends \PHPUnit\Framework\TestCase
{
    public function testSetGetFirstName()
    {
        $user = new \App\Models\user;

        $user->setFirstName('Billy');

        $this ->assertEquals($user->getFirstName(), 'Billy');
    }
        
}