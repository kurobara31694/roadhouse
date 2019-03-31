<?php 

include_once('db_conn.php');

?>

<!DOCTYPE html>
<!-- Main Sign In Page -->
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

  <title>NAME | Sign In</title>
</head>

<body>
  <div class="container" id="main">

    <h1>Welcome to Oil Company</h1>
    <h2>Sign in below.</h2>

    <div class="container" id="login-section">
      <form method="post" action="login.php" class="form-group">

          <div class="form-group">
            <label>Username</label>
            <input type="username" id="input-field" class="form-control" placeholder="Enter username" name="username"required>
            <small id="help-text" class="form-text text-muted">Please make sure all letters are lowercase.</small>
            <span class="errorMsg"> <?php echo $errMsg;?></span>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" id="input-field" class="form-control" placeholder="Password" name= "password" required>
            <span class="errorMsg"> <?php echo $errMsg;?></span>
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <!-- Section that takes them to sign up -->
      <a href="signup.php">Don't have an accout? Sign Up!</a>
    </div>

  </div>

</body>

</html>

<!-- User Logs in here -->
<?php
include_once(app/Models/User.php);

// Form Validation
$errMsg = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["username"])) {
	  $errMsg = "Username is required";
	} else {
	  $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
  }
  if (empty($_POST["password"])) {
    $errMsg = "Password is required";
  } else {
    $username = test_input($_POST["password"]);
  }
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }

?>