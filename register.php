<!-- User Registration -->
<?php
include_once('db_conn.php');

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
  <form method= "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin-top: 50px" class="input-group">
    <div class="container">
      <h1>Complete Your Profile</h1>
      <div class="input-group">
      <p> Full Name</p>
      <input class="form-control" type="text" name="fullname" placeholder="Please enter full name. Ex: Bill B. Baggins">
      </div>
      <div class="input-group">
      <p> Address</p>
      <input class="form-control" type="text" name="address1" placeholder="Please enter address. Ex:123 Gondor Dr.">
      </div>

      <div class="input-group">
      <p>City</p>
      <input  class="form-control" type="text" name="city">
       </div>

       <div class="input-group">
      <p>State</p>
      <input  class="form-control" type="text" name="state">
      </div>

      <div class="input-group">
      <p>Zipcode</p>
      <input  class="form-control" type="text" name=zipcode>
      </div>
      <button type="submit" class="btn btn-primary" name="register">Submit</button>

    </div>
    <a href="wel.php">Want to go to the welcome page?</a>
  </form>

</body>

</html>