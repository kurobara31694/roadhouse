
<?php


include_once('db_conn.php');

// define variables and set to empty values
//$emailErr = "";
//$email = "";

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  //if (empty($_POST["email"])) {
  //$emailErr = "Email is required";
  //} else {
    //$email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     // $emailErr = "Invalid email format"; 
   // }
 // }
    
  //}

//function test_input($data) {
  //$data = trim($data);
  //$data = stripslashes($data);
  //$data = htmlspecialchars($data);
  //return $data;
//}
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
  <link rel="stylesheet" href="resource/styles.css">

  <title>NAME | Create Your Account</title>
</head>

<body>
<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-primary justify-content-between">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <a class="navbar-brand" href="login.php">
        <img src="icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Fellowship
      </a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-item nav-link active" href="wel.php">Fuel Calculator <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="fuelhist.php">Fuel History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Edit Profile</a>
        </li>
    </div>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item active">
          <?php
          if (!empty($uname)) {
            echo '<a class="nav-item nav-link active">
        Hi ' . $uname . '!</a>';
          } else {
            echo '<a class="nav-item nav-link active">
        Hi Guest!<span class="sr-only">(current)</span></a>';
          }
          ?>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 pull-right">
            <?php
            if (!empty($uname)) {
              ?>
              <a class="btn btn-danger my-2 my-sm-0" href="logout.php">Log Out</a>
            <?php
          } else {
            ?>
              <div class="btn-group" role="group">
                <a class="btn btn-success my-2 my-sm-0" href="login.php">Log In</a>
                <a class="btn btn-warning my-2 my-sm-0" href="signup.php">Sign Up</a>
              </div>

            <?php
          }
          ?>
          </form>
    </div>
  </nav>
  
  <div class="container" id="main">
  <br><br>
    <h1>Create Your Account</h1>

    <div class="container" id="login-section">
      <form method="post" action="signup.php" >
        
        <div class="form-group">
          <label>Username</label>
          <div class="input-group">
          <input type="username" id="input-field" name="username" class="form-control" placeholder="johndoe95@aol.com">
          </div>
          <small id="help-text" class="form-text text-muted">Please make sure this is the correct email.</small>
        </div>

        <div class="form-group">
          <label>Password</label>
          <div class="input-group">
          <input type="password" id="input-field" class="form-control" name= "password" placeholder="************">
          </div>
          <small id="help-text" class="form-text text-muted">Please enter at least 5-10 characters.</small>
        </div>
        
        <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
      </form>
      <a href="Login.php">Have an account? Sign in!</a>
    </div>
  </div>


</body>

</html>
