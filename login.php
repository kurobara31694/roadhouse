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

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>