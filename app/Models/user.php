<?php

namespace App\Models;

class user {

    // When DB populates the name, 
    // tuple contians underscore
    public $first_name;

    public function setFirstName($firstName){
        $this->first_name = $firstName;
    }
    
    public function getFirstName(){

    //Dummy data to see if test case passes. 
    // return 'Billy';
    return $this->first_name;
}
}
