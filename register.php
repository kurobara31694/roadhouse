<!-- User Registration -->
<?php
include_once(app/Models/User.php);

// Form Validation
$fullname = $address = $city = $state = $zip= "";
$nameErr = $zErr= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["fullname"])) {
	  $nameErr = "Company Name is required";
	} else {
	  $name = test_input($_POST["fullname"]);
	  // check if name only contains letters and whitespace
	  if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
		$nameErr = "Only letters and white space allowed"; 
	  }
	}
	
	if (empty($_POST["address"])) {
	  $nameErr = "address is required";
  }
  if (empty($_POST["state"])) {
	  $nameErr = "state is required";
  }
  if (empty($_POST["city"])) {
	  $nameErr = "City is required";
	}
	  
	if (empty($_POST["zipcode"])) {
	  $zip = "";
	} else {
	  $zip = test_input($_POST["zipcode"]);
	  
	  if (!preg_match("/^[0-9]*$.",$zip)) {
		$zErr = "Invalid zipcode"; 
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
<!doctype html>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">

  <!-- Our stylesheet -->
  <link rel="stylesheet" href="styles/style.css">

  <title>Complete Your Profile</title>
</head>

<body>
  <form method= "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin-top: 50px" class="form-group">
    <div class="container">
      <h1>Complete Your Profile</h1>

      <p> Full Name</p>
      <input class="form-control" type="text" name="fullname" placeholder="Please enter full name. Ex: Bill B. Baggins">
      <span class="errorMsg"> <?php echo $nameErr;?></span>
      <p> Address</p>
      <input class="form-control" type="text" name="address1" placeholder="Please enter address. Ex:123 Gondor Dr.">
      
    
      <p>City</p>
      <input  class="form-control" type="text" name="city">

      <p>State</p>
      <input  class="form-control" type="text" name="state">

      <p>Zipcode</p>
      <input  class="form-control" type="text" name=zipcode>
      <span class="errorMsg"> <?php echo $zErr;?></span>
      <button style="margin-top: 25px" class="btn btn-primary" type="button">Submit</button>

    </div>

  </form>

</body>

</html>