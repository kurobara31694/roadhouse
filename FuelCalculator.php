<!-- Critical -->
<!-- User Profile and the Fuel Calculator -->
<?php
include_once(app/Models/User.php);

// Form Validation
$numGallons = $chooseMonth = $chooseDay = $chooseYear = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if(isset($_POST['calculate'])){
		$numGallons = test_input($_POST["numGallons"]);
		// $chooseMonth = test_input($_POST["chooseMonth"]);
		// $chooseDay = test_input($_POST["chooseDay"]);
		// $chooseYear = test_input($_POST["chooseYear"]);
		
		// Checking if the input is numeric
		if(!preg_match("/^[0-9]*$.", $numGallons)){
			$errorMessage = "Only numbers allowed, dumbass.";
		}
	
		elseif(strlen($numGallons)<4){
			$errorMessage = "Error: Order limited to only 999 gallons, asshole.";
		}
	
		else {
			echo 'Success';
		}
	}

}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }


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
		<h1>Enter information below</h1>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-group">
			<div class="container" style="margin-top: 40px">

				<label>Requested Number of Gallons</label>
				<input class="form-control" type="text" id="numGallons" name="numGallons" required>
				<span class="errorMsg"> <?php echo $errorMessage;?></span>
				<br><br>


				<div id="date_value" name="date_value">
					<h3> For Delivery Date</h3>

					<!-- Select Month -->
					<label id="chooseMonth" name="chooseMonth">Choose the month:</label>
					<select class="form-control" required>
						<option selected value="1">January</option>
						<option value="2">February</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>

					<!-- Select Day -->
					<label>Choose the Day of the month:</label>

					<input name="chooseDay" id="chooseDay" type="text" class="form-control"
						placeholder="Enter the day as a number, like 14." required>

					<!-- Enter year -->
					<label>Enter the year:</label>
					<input name="chooseYear" id="chooseYear" type="text" class="form-control" placeholder="2019"
						required>

				</div>

				<button class="btn btn-success" name="calculate" id="calculate" type="Submit">Calculate </button>


				<h2 style="margin-top: 25px"> Total Amount Due: </h2>

				<!-- This where the calculation will take place -->
				<!-- Should be PHP script -->
				<!-- With database calls -->

				<h2>$</h2>

				<button class="btn btn-primary" type="button">Order History</button>

				<button class="btn btn-danger" type="button">Log Out</button>
			</div>

	</div>

</body>

</html>


<!-- Backend for fuel calculator -->

<?php




?>