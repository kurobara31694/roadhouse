
<?php

class FuelCalculator {

	public $num_gallons;
	public $month_value;

	public function setNumGallons($numGallons){
		$this->num_gallons = $numGallons;
	}

	public function getNumGallons(){

		return '13';

		// return $this->num_gallons;
	}


	public function setMonth($month){
		$this->month_value = $month;
	}

}

