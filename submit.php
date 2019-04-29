<?php
error_reporting(0);

$chooseMonth = $_POST['chooseMonth'] ;
$chooseDay = $_POST['chooseDay'];
$chooseYear = $_POST['chooseYear'];
$numGallons = $_POST['numGallons'];
$address = $_POST['address'] ;
$discount = $_POST['discount'];
$transportationCost = $_POST['transportationCost'];
$seasonalrate = $_POST['seasonalrate'];
$pricePerGallon = $_POST['pricePerGallon'];
$stateName = $_POST["stateName"];
$zipCode = $_POST["zipCode"];
$totalPrice = $numGallons * $pricePerGallon;

if (empty(!$numGallons) || !empty($chooseMonth) || !empty($chooseDay) || !empty($chooseYear)) {

          echo '
          <h3>Congratulations! Your order has been placed.</h3>
          <h5>Your invoice:</h5>


        <div id="invoice-cont">

        <div id="left">

          
        <label>Delivering to:</label>
        <p>', $address, ', ', $stateName, ', ', $zipCode, ' </p>

        <label>Date of Delivery:</label>
        <p>', $chooseMonth, '-', $chooseDay, '-', $chooseYear, '</p>


        <label>Gallons ordered:</label>
        <p>', $numGallons, ' gallons</p>

        <label>Discount(if any)</label>
        <p>$', $discount, '</p>

        <label>Transportation cost:</label>
        <p>$', $transportationCost, '</p>
        </div>

        <div id="right">


        <label>Seasonal Fluctuation Rate:</label>
        <p>$', $seasonalrate, '</p>

        <label>Price Per Gallon:</label>
        <p>$', $pricePerGallon, '</p>

        <label>Total Price:</label>
        <h3>$', $totalPrice, '</h3>
        </div>';
} else{
    echo "Not all fields Are filled";
}
?>