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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Our stylesheet -->
  <link rel="stylesheet" href="resource/styles.css">

  <title>Fellowship | Sign In</title>
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

  <div class="container-fluid" id="main">

    <h1>Welcome to Fellowship</h1>
    <p>Buying Fuel has never been easier!</p>
    <br>
    <br>
    <h2>Sign in below.</h2>

    <div id="login">

      <!-- Sign in Form -->
      <div id="login-section">
        <form method="post" action="login.php">

          <label>Username</label>
          <div class="input-group">
            <input type="username" id="input-field" class="form-control" placeholder="Enter username" name="username" required>
          </div>

          <label>Password</label>
          <div class="input-group">
            <input type="password" id="input-field" class="form-control" placeholder="Password" name="password" required>
          </div>

          <button type="submit" class="btn btn-lg btn-primary mt-3" name="login_user">Log In</button>

        </form>

      </div>

      <!-- SVG Illustration -->
      <div id="svg-illus">
        <img src="undraw_payments_21w6.svg" alt="">
      </div>

    </div>
  </div>

</body>

</html>