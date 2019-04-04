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
  <form method= "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin-top: 50px" class="form-group">
    <div class="container">
      <h1>Complete Your Profile</h1>

      <p> Full Name</p>
      <input class="form-control" type="text" name="fullname" placeholder="Please enter full name. Ex: Bill B. Baggins">
      
      <p> Address</p>
      <input class="form-control" type="text" name="address1" placeholder="Please enter address. Ex:123 Gondor Dr.">
      
    
      <p>City</p>
      <input  class="form-control" type="text" name="city">

      <p>State</p>
      <input  class="form-control" type="text" name="state">

      <p>Zipcode</p>
      <input  class="form-control" type="text" name=zipcode>
      
      <button style="margin-top: 25px" class="btn btn-primary" type="button">Submit</button>

    </div>

  </form>

</body>

</html>