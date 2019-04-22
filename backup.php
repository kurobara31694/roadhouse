<!-- Critical -->
<!-- User Profile and the Fuel Calculator -->
<?php

// Check connection
if ($mysqli === false) {
	die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Form Validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['calculate'])) {
		$numGallons = test_input($_POST["numGallons"]);
		$chooseMonth = test_input($_POST["chooseMonth"]);
		$chooseDay = test_input($_POST["chooseDay"]);
		$chooseYear = test_input($_POST["chooseYear"]);

		// Checking if the input is numeric
		if (!preg_match("/^[0-9]*$.", $numGallons)) {
			$errorMessage = "Only numbers allowed.";
		}
	}
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

// Calculator

// Extra variables
$transportationCost = 0.02;
$discount = 0.01;
// Pricing module - to be added later
$pricePerGallon = 100;

// Fix for Month selection
// 	$chooseMonth = array('January', 'Feb', 'Mar', 'Apr', 'Apr', 'Apr', 'Apr', 'Apr', 'Apr', 'Apr', 'Apr', 'Apr');
// $selected_key = $_POST['chooseMonth'];
// $selected_val = $animals[$_POST['chooseMonth']];


$totalPrice = $numGallons * ($transportationCost + $discount + $pricePerGallon);


$sql = "INSERT INTO fuelcalc (OrderID, num_gallons, c_month, c_day, c_year, price_per_gallon, trans_cost, discount, total_price) VALUES (NULL,'$numGallons', '$chooseMonth', '$chooseDay', '$chooseYear', '$pricePerGallon', '$transportationCost', '$discount', '$totalPrice')";

if ($mysqli->query($sql) === true) {
	echo "Records inserted successfully.";
} else {
	echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

// Close connection
$mysqli->close();

?>

<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="resource/styles.css">
</head>

<body>
	<!-- Beginning of Fuel Calculator -->

	<div class="container" id="main">


		<h1 id="welcome">Hello, User.</h1>


		<form method="post" action="#" class="form-group">
			<div class="container" style="margin-top: 40px">

				<h2>Enter information below</h2>

				<label>Requested Number of Gallons</label>
				<input class="form-control" type="number" id="numGallons" name="numGallons" required
					placeholder="This must be a number" min="1" max="100000">
				<br><br>

				<div id="date_value" name="date_value">
					<h3> For Delivery Date</h3>

					<!-- Select Month -->
					<!-- <label id="chooseMonth" name="chooseMonth">Choose the month:</label>
					<select class="form-control" method="POST" required>
						<option selected value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>

					</select> -->

					<!-- Select Month -->
					<!-- Assigning a number to each month as it will make it 
				easier later to do the seasonal fulctuation calculation -->
					<label>Choose the month:</label>
					<?php
					$MonthArray = array("1" => "January", "2" => "February", "3" => "March", "4" => "April", "5" => "May", "6" => "June", "7" => "July", "8" => "August", "9" => "September", "10" => "October", "11" => "November", "12" => "December");
					?>
					<select name="chooseMonth" class="form-control" required>
						<option value="">Select Month</option>
						<?php
						foreach ($MonthArray as $monthNum => $chooseMonth) {
							$selected = (isset($getMonth) && $getMonth == $monthNum) ? 'selected' : '';

							echo '<option ' . $selected . ' value="' . $monthNum . '">' . $chooseMonth . '</option>';
						}
						?>
					</select>

					<label>Choose the Day of the month:</label>
					<input name="chooseDay" id="chooseDay" type="text" class="form-control"
						placeholder="Enter the day as a number, like 14." required>

					<!-- Enter year -->
					<label>Enter the year:</label>
					<input name="chooseYear" id="chooseYear" type="text" class="form-control" placeholder="2019"
						min="2019" required>

				</div>

				<button class="btn btn-success" name="calculate" id="calculate" type="Submit">Calculate </button>


				<h2 style="margin-top: 25px"> The Bill:
					<?php
					if (isset($_POST['calculate'])) {

						$selected_val = $_POST["chooseMonth"];
						echo "You ordered " . $numGallons . " gallons" . "<br>";
						echo "Your order will be delivered on " . $selected_val . " " . $chooseDay . " " . $chooseYear . "<br>";
						echo "Your transportation cost is $" . $transportationCost . "<br>";
						echo "Your discount is $" . $discount . "<br>";
						echo "Your pricePerGallon is $" . $pricePerGallon . "<br>";
						echo "Total Price is $ " . $totalPrice;
					}
					?>
				</h2>

				<!-- This where the calculation will take place -->
				<!-- Should be PHP script -->
				<!-- With database calls -->


				<button class="btn btn-primary" type="button">Order History</button>

				<button class="btn btn-danger" type="button">Log Out</button>
			</div>

			<h2>Fuel History</h2>
			<?php
			$sql = "SELECT OrderID, numGallons, c_month, c_day, c_year, price_per_gallon, trans_cost, total_price FROM fuelcalc";
			$result = $conn->query($sql);

			echo "<table border='1'>
			<tr>
			<th>OrderID</th>
			<th>numGallons</th>
			<th>c_month</th>
			<th>c_day</th>
			<th>c_year</th>
			<th>price_per_gallon</th>
			<th>trans_cost</th>
			<th>total_price</th>
			</tr>";
			
			if ($result->num_rows > 0) {
			while ($row =  $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['OrderID'] . "</td>";
					echo "<td>" . $row['numGallons'] . "</td>";
					echo "<td>" . $row['c_month'] . "</td>";
					echo "<td>" . $row['c_day'] . "</td>";
					echo "<td>" . $row['c_year'] . "</td>";
					echo "<td>" . $row['price_per_gallon'] . "</td>";
					echo "<td>" . $row['trans_cost'] . "</td>";
					echo "<td>" . $row['total_price'] . "</td>";
					echo "</tr>";
				}
			}
			echo "</table>";

			$conn->close();
			?>

	</div>

</body>

</html>