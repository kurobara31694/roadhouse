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
  <link rel="stylesheet" href="resources/style.css">

  <title>NAME | Sign In</title>
</head>

<body>
  <div class="container" id="main">

    <h1>Welcome to Oil Company</h1>
    <h2>Sign in below.</h2>

    <div class="container" id="login-section">
      <form method="post" action="login.php" >

          <div class="input-group">
            <label>Username</label>
            <input type="username" id="input-field" class="form-control" placeholder="Enter username" name="username"required>
            <small id="help-text" class="form-text text-muted">Please make sure all letters are lowercase.</small>
            
          </div>

          <div class="input-group">
            <label>Password</label>
            <input type="password" id="input-field" class="form-control" placeholder="Password" name= "password" required>
            
          </div>

        <button type="submit" class="btn btn-primary" name="login_user">Submit</button>
      </form>
      <!-- Section that takes them to sign up -->
      <a href="signup.php">Don't have an accout? Sign Up!</a>
    </div>

  </div>

</body>

</html>