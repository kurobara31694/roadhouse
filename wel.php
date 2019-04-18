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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Our stylesheet -->
  <link rel="stylesheet" href="resources/style.css">

  <title>HOME PAGE</title>

</head>

<body>

  <main class="container">

    <?php

    echo "<h1> User " . $_SESSION['user_name']. " with ID". $_SESSION['user_id'] . " logged in.\r\n </h1>";
    $uname = $_SESSION['user_name'];
    $userID = $_SESSION['user_id'];
    $fuel_userid = $_SESSION['cust_user_id'];


    $query1 = "SELECT * FROM log WHERE user_name='$uname'";
    $query2 = "SELECT cust_user_id FROM fuelcalc WHERE user_id = '$fuel_userid'";

    if ($result2 = $dbconn->query($query2)){
      while ($row = $result2->fetch_assoc()){
        $fuel_userid = $row["cust_user_id"];
        echo "<h5> User id from fuelcalc table is ".$fuel_userid."</h5>";
      }
    } else {
      echo "\r\nUser does not exist";
    }


    if ($result1 = $dbconn->query($query1)) {

      while ($row = $result1->fetch_assoc()) {
        $field1name = $row["full_name"];
        $field2name = $row["city"];
        $field3name = $row["state"];
        $field4name = $row["zip"];

        // User ID from Log
        $userID = $row['user_id'];

        echo nl2br("\r\nName: " . $field1name);

        echo nl2br("\r\nState: " . $field3name);

        echo nl2br("\r\nCity: " . $field2name);

        echo nl2br("\r\nZip: " . $field4name);

        echo nl2br("\r\nUser ID_Login: " . $userID);
      }
    }


    ?>


    <div class="container" id="buttons">

      <a href="login.php">Don't wanna be here? LEAVE!</a>
      <a href="register.php">wanna register more information?</a>
    </div>

    <!-- Testing the calculator -->
    <section>

      <!-- Beginning of Fuel Calculator -->

      <div class="container" id="main">


        <h1 id="welcome">Hello, User.</h1>


        <form method="post" action="#" class="form-group">
          <div class="container" style="margin-top: 40px">

            <h2>Enter information below</h2>

            <label>Requested Number of Gallons</label>
            <input class="form-control" type="number" id="numGallons" name="numGallons" required
              placeholder="This must be a number" min="1" max="100000">
            <br><br>

            <div id="date_value" name="date_value">
              <h3> For Delivery Date</h3>
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

              <label>Choose the Day of the month:</label>
              <input name="chooseDay" id="chooseDay" type="text" class="form-control"
                placeholder="Enter the day as a number, like 14." required>

              <!-- Enter year -->
              <label>Enter the year:</label>
              <input name="chooseYear" id="chooseYear" type="text" class="form-control" placeholder="2019" min="2019"
                required>

            </div>

            <button class="btn btn-success" name="calculate" id="calculate" type="Submit">Calculate </button>


            <h2 style="margin-top: 25px"> The Bill:
              <?php
              if (isset($_POST['calculate'])) {
                $selected_val = $_POST["chooseMonth"];
                echo "You ordered " . $numGallons . " gallons" . "<br>";
                echo "Your order will be delivered on " . $selected_val . " " . $chooseDay . " " . $chooseYear . "<br>";
                echo "Your transportation cost is $" . $transportationCost . "<br>";
                echo "Your discount is $" . $discount . "<br>";
                echo "Your pricePerGallon is $" . $pricePerGallon . "<br>";
                echo "Total Price is $ " . $totalPrice;
              }
              ?>
            </h2>

            <!-- This where the calculation will take place -->
            <!-- Should be PHP script -->
            <!-- With database calls -->

          <h2>Fuel History</h2>
          <?php
          $sql = "SELECT OrderID, numGallons, c_month, c_day, c_year, price_per_gallon, trans_cost, total_price FROM fuelcalc";
          $result = $conn->query($sql);
          echo "<table border='1'>
            <tr>
              <th>OrderID</th>
              <th>numGallons</th>
              <th>c_month</th>
              <th>c_day</th>
              <th>c_year</th>
              <th>price_per_gallon</th>
              <th>trans_cost</th>
              <th>total_price</th>
            </tr>";

          if ($result->num_rows > 0) {
            while ($row =  $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['OrderID'] . "</td>";
              echo "<td>" . $row['numGallons'] . "</td>";
              echo "<td>" . $row['c_month'] . "</td>";
              echo "<td>" . $row['c_day'] . "</td>";
              echo "<td>" . $row['c_year'] . "</td>";
              echo "<td>" . $row['price_per_gallon'] . "</td>";
              echo "<td>" . $row['trans_cost']."</td>";
              echo "<td>" . $row['total_price']."</td>";
              echo "</tr>";
            }
          }

          echo "</table>";
          $conn->close();
          ?>

      </div>


    </section>

  </main>

</body>

</html>