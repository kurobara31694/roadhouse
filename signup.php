
<?php
// define variables and set to empty values
$emailErr = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
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

  <title>NAME | Create Your Account</title>
</head>

<body>
  <div class="container" id="main">

    <h1>Create Your Account</h1>

    <div class="container" id="login-section">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <div class="form-group">
          <label>Username</label>
          <input type="username" id="input-field" class="form-control" placeholder="johndoe95@aol.com">
          <small id="help-text" class="form-text text-muted">Please make sure this is the correct email.</small>
          <span class="errorMsg"> <?php echo $emailErr;?></span>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" id="input-field" class="form-control" placeholder="************">
          <small id="help-text" class="form-text text-muted">Please enter at least 5-10 characters.</small>
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
      </form>
      <a href="Login.html">Have an account? Sign in!</a>
    </div>
  </div>


</body>

</html>