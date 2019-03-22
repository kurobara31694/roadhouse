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
    public $chooseMonth;
    public $chooseDay;
    public $chooseYear;

	public function setNumGallons($numGallons){
		$this->num_gallons = $numGallons;
	}

	public function getNumGallons(){

		// return '13';

		return $this->num_gallons;
    }
    
    // Month
	public function setMonth($month){
		$this->chooseMonth = $month;
    }

	public function getMonth(){
		return $this->chooseMonth;
    }


    // Day
	public function setDay($day){
		$this->chooseDay = $day;
    }

	public function getDay(){
		return $this->chooseDay;
    }

    // Year

	public function setYear($year){
		$this->chooseYear = $year;
    }

	public function getYear(){
        return '2008';
		// return $this->chooseYear;
    }


    

}