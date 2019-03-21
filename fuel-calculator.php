<!-- Critical -->
<!-- User Profile and the Fuel Calculator -->


<?php 
//   session_start(); 

//   if (!isset($_SESSION['username'])) {
//   	$_SESSION['msg'] = "You must log in first";
//   	header('location: login.php');
//   }
//   if (isset($_GET['logout'])) {
//   	session_destroy();
//   	unset($_SESSION['username']);
//   	header("location: login.php");
//   }
?>


<?php

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

		<form class="form-group">
			<div class="container" style="margin-top: 40px">

				<p>Requested Number of Gallons</p>
				<input class="form-control" type="text" name="gallons">

				<div id="date-select">
					<h3> Select Delivery Date</h3>

					<!-- Select Month -->
					<p id="input-field">Choose the month:</p>
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
					<p id="input-field" >Enter the Day:</p>
					
					<input name="day" type="text" class="form-control" placeholder="23">

					<!-- Enter year -->
					<p id="input-field" >Enter the year:</p>
					<input name="year" type="text" class="form-control" placeholder="2019">

				</div>

				<button class="btn btn-success" type="button">Calculate </button>

				<h2 style="margin-top: 25px"> Total Amount Due: </h2>
				<h2>$</h2>

				<button class="btn btn-primary" type="button">Order History</button>

				<button class="btn btn-danger" type="button">Log Out</button>
			</div>

	</div>


	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
		<div class="error success">
			<h3>
				<?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
			</h3>
		</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
		<p>Welcome <strong>
				<?php echo $_SESSION['username']; ?></strong></p>
		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
</body>

</html>


<!-- Backend for fuel calculator -->

<?php




?>
