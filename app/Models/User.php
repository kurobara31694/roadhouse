<?php

namespace App\Models;

class User {
    public $user_name;

    public function setUsername($username){
        $this->user_name = $username;
    }

    public function getUsername(){

        // Uncomment below to run testcase
        // return 'jojo222';


        // If test case passes
        //this should also pass.
        return $this->user_name;
    }
}