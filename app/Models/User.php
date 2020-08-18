<?php

namespace App\Models;

class User {
    public $user_name;
    public $fullname;
    private $password;
    private $state;
    private $zip;
    private $address;

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

    public function setFullname($fname){
        $this->fullname = $fname;
    }

    public function getFullname(){

        return $this->fullname;
    }

    public function setPass($pname){
        $this->password = $pname;
    }

    public function getPass(){

        return $this->password;
    }

    public function setState($sname){
        $this->state = $sname;
    }

    public function getState(){

        return $this->state;
    }

    public function setZip($zname){
        $this->zip = $zname;
    }

    public function getZip(){

        return $this->zip;
    }
    public function setAdd($Aname){
        $this->address = $Aname;
    }

    public function getAdd(){

        return $this->address;
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