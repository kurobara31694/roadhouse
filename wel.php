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

  <title>HOME PAGE</title>

</head>

<body>

  <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-primary justify-content-between">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <a class="navbar-brand" href="#">
        <img src="icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Fellowship
      </a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-item nav-link active" href="wel.php">Fuel Calculator </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="fuelhist.php">Fuel History<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Edit Profile</a>
        </li>
    </div>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item active">
          <?php
          if (!empty($_SESSION['user_name'])) {
            echo '<a class="nav-item nav-link active">
        Hi ' . $_SESSION['user_name'] . '!</a>';
          } else {
            echo '<a class="nav-item nav-link active">
        Hi Guest!<span class="sr-only">(current)</span></a>';
          }
          ?>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 pull-right">
            <?php
            if (!empty($_SESSION['user_name'])) {
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

  <?php
  $uname = $_SESSION['user_name'];

  $query1 = "SELECT * FROM log WHERE user_name='$uname'";


  // Information from Login Table
  if ($result1 = $dbconn->query($query1)) {

    while ($row = $result1->fetch_assoc()) {
      $userID = $row["user_id"];
      $address = $row["address"];
      $fullName = $row["full_name"];
      $cityName = $row["city"];
      $stateName = $row["state"];
      $zipCode = $row["zip"];
      /*
        echo nl2br("\r\nName: " . $fullName);
        echo nl2br("\r\nCity: " . $cityName);
        echo nl2br("\r\nState: " . $stateName);
        echo nl2br("\r\nZip: " . $zipCode);
        echo nl2br("\r\nUser ID_Login: " . $userID);
        */
    }
  }

  // Trying to display fuel calc info JUST for logged user

  // $query2 = "SELECT cust_user_id FROM fuelcalc where cust_username = $uname";
  // $result2 = $dbconn->query($query2);

  // if ($result2->num_rows > 0) {
  //   while ($row = $result2->fetch_assoc()) {
  //     echo nl2br("\r\n User ID from fuel table is: " . $row["cust_user_id"]);
  //   }
  // } else {
  //   echo "<h2> NOOOOOOOOOOOOOOOOOOOOOOOO </h2>";
  // }

  // Form Validation
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['calculate'])) {
      $numGallons = test_input($_POST["numGallons"]);
      $chooseMonth = test_input($_POST["chooseMonth"]);
      $chooseDay = test_input($_POST["chooseDay"]);
      $chooseYear = test_input($_POST["chooseYear"]);

      // Checking if the input is numeric
      if (!preg_match("/^[0-9]*$.", $numGallons)) {
        $errorMessage = "Only numbers allowed.";
      }

      if (empty($numGallons) || empty($chooseMonth) || empty($chooseDay) || empty($chooseYear)) {
        $errorMessage = "Please fill form completely";
      }
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  // Fuel Calculator
  //Formulas
  $transportationCost;
  $discount;
  $seasonalrate;
  $GRF;
  $pricePerGallon;
  $baseprice = 1.50;
  $profit = .10;

  if ($stateName == "TX") {
    $transportationCost = .02;
  } else {
    $transportationCost = .04;
  }

  $SQLresult = '';
  $row_cnt = '';
  $SQLresult = $dbconn->query("SELECT * FROM fuelcalc
    WHERE cust_user_id='$userID' ");
  /* determine number of rows result set */
  $row_cnt = $SQLresult->num_rows;

  if ($row_cnt > 0) {
    $discount = .01;
  } else {
    $discount = 0;
  }

  if ($chooseMonth >= 3 && $chooseMonth <= 8) {
    $seasonalrate = .04;
  } else {
    $seasonalrate = .03;
  }

  if ($numGallons > 1000) {
    $GRF = .02;
  } else {
    $GRF = .03;
  }

  $pricePerGallon = $baseprice + ($baseprice * ($transportationCost - $discount + $GRF + $profit + $seasonalrate));

  $totalPrice = $numGallons * $pricePerGallon;

  $query3 = "INSERT INTO fuelcalc (num_gallons, c_month, c_day, c_year, price_per_gallon, trans_cost, discount, seasonalrate, GRF, total_price, cust_user_id) VALUES ('$numGallons', '$chooseMonth', '$chooseDay', '$chooseYear', '$pricePerGallon', '$transportationCost', '$discount', '$seasonalrate', '$GRF', '$totalPrice', '$userID')";

  if ($uname == true) {
    # code...
    if (empty(!$numGallons) || !empty($chooseMonth) || !empty($chooseDay) || !empty($chooseYear)) {
      $result3 = $dbconn->query($query3);
    }
    if ($result3 == true) {

      echo "";
    }
  }

  ?>
  <!-- Beginning of Fuel Calculator -->
  <div class="container-fluid" id="fuelcalc">

    <form method="post" action="#" class="form-group">
      <h1> Hello,
        <?php

        echo $fullName;
        ?>.
      </h1>
      <h3>Order fuel below</h3>

      <label>Number of Gallons</label>
      <input class="form-control" type="number" id="numGallons" name="numGallons" required placeholder="This must be a number" min="1" max="100000">
      <small>Orders over 1000 gallons receive a 10% discount!</small>
      <br>


      <!-- Assign values to Month -->
      <label>Choose the month:</label>

      <?php
      $MonthArray = array("1" => "January", "2" => "February", "3" => "March", "4" => "April", "5" => "May", "6" => "June", "7" => "July", "8" => "August", "9" => "September", "10" => "October", "11" => "November", "12" => "December");
      ?>

      <select name="chooseMonth" class="form-control" required>
        <option value="">Select Month</option>
        <?php
        foreach ($MonthArray as $monthNum => $chooseMonth) {
          $selected = (isset($getMonth) && $getMonth == $monthNum) ? 'selected' : '';
          echo '<option ' . $selected . ' value="' . $monthNum . '">' . $chooseMonth . '</option>';
        }

        ?>
      </select>

      <!-- Enter year -->
      <label>Choose the Day:</label>
      <input name="chooseDay" id="chooseDay" type="number" min="1" max="31" class="form-control" placeholder="Enter the day as a number, like 14." required>
      <small>You may use your arrow keys to increment the date.</small>
      <br>

      <!-- Enter year -->
      <label>Enter the year:</label>
      <input name="chooseYear" id="chooseYear" type="number" class="form-control" placeholder="2019" min="2019" required>
      <small>You may use your arrow keys to increment the year.</small>
      <br>

      <?php
      if (!empty($_SESSION['user_name'])) {
        ?>
        <button class="btn btn-success" name="calculate" id="calculate" type="Submit">Submit Order </button>

      <?php
    } else {
      ?>
        <button class="btn btn-success" name="calculate" id="calculate" type="Submit" disabled>Calculate </button>
        <small class="text-danger">Please login</small>
      <?php
    }
    ?>


      <div id="invoice">

        <?php
        $selected_val = $_POST["chooseMonth"];
        if (isset($_POST['calculate'])) {
          echo '
          <h3>Congratulations! Your order has been placed.</h3>
          <h5>Your invoice:</h5>


        <div id="invoice-cont">

        <div id="left">

          
        <label>Delivering to:</label>
        <p>', $address, ', ', $stateName, ', ', $zipCode, ' </p>

        <label>Date of Delivery:</label>
        <p>', $selected_val, '-', $chooseDay, '-', $chooseYear, '</p>


        <label>Gallons ordered:</label>
        <p>', $numGallons, ' gallons</p>

        <label>Discount(if any)</label>
        <p>$', $discount, '</p>

        <label>Transportation cost:</label>
        <p>$', $transportationCost, '</p>
        </div>

        <div id="right">


        <label>Seasonal Fluctuation Rate:</label>
        <p>$', $seasonalrate, '</p>

        <label>Price Per Gallon:</label>
        <p>$', $pricePerGallon, '</p>

        <label>Total Price:</label>
        <h3>$', $totalPrice, '</h3>
        </div>';
        }
        ?>

      </div>
      <br>
      <br>
  </div>
</body>

</html>