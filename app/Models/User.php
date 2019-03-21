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

class FuelCalc {

	public $num_gallons;
	public $month_value;

	public function setNumGallons($numGallons){
		$this->num_gallons = $numGallons;
	}

	public function getNumGallons(){

		// return '13';

		return $this->num_gallons;
	}

	public function setMonth($month){
		$this->month_value = $month;
    }

	public function getMonth(){
		return $this->month_value;
    }
    

}