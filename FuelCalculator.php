<!-- Critical -->
<!-- User Profile and the Fuel Calculator -->
<?php
include_once(app/Models/User.php);

// Form Validation
$numGallons = $chooseMonth = $chooseDay = $chooseYear = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $numGallons = test_input($_POST["numGallons"]);
  $chooseMonth = test_input($_POST["chooseMonth"]);
  $chooseDay = test_input($_POST["chooseDay"]);
  $chooseYear = test_input($_POST["chooseYear"]);
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	 crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="resource/styles.css">
</head>

<body>

	<!-- Beginning of Fuel Calculator -->

	<div class="container" id="main">
		<h2>Enter information below</h2>

		<form action="app/Models/User.php" class="form-group">
			<div class="container" style="margin-top: 40px">

				<p>Requested Number of Gallons</p>
				<input class="form-control" type="text" id="numGallons" name="numGallons">

				<div id="date_value" name="date_value">
					<h3> Select Delivery Date</h3>

					<!-- Select Month -->
					<p id="chooseMonth" name="chooseMonth">Choose the month:</p>
					<select class="form-control">
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
					<p>Enter the Day:</p>
					
					<input name="chooseDay" id="chooseDay" type="text" class="form-control" placeholder="23">

					<!-- Enter year -->
					<p>Enter the year:</p>
					<input name="chooseYear" id="chooseYear" type="text" class="form-control" placeholder="2019">

				</div>

				<button class="btn btn-success" name="Calculate" type="submit">Calculate </button>


				<h2 style="margin-top: 25px"> Total Amount Due: </h2>

				<!-- This where the calculation will take place -->
				<!-- Should be PHP script -->
				
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