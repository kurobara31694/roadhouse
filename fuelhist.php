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
  <link rel="stylesheet" href="resources/style.css">

  <title>Fuel History</title>

</head>

<body>

  <main class="container">

  <?php
    $uname = $_SESSION['user_name'];

    $query1 = "SELECT * FROM log WHERE user_name='$uname'";


    // Information from Login Table
    if ($result1 = $dbconn->query($query1)) {

      while ($row = $result1->fetch_assoc()) {
        $userID = $row["user_id"];
    
        $query2 = "SELECT * FROM FuelHistory WHERE user_id='$userID'";
        if ($result2 =$dbconn->query($query2)) {
            if ($result2->num_rows > 0) {
              $selected_val = $_POST["chooseMonth"];
                echo "
                <h2>Fuel History</h2>
                <table class='table table-striped'>
                <thead class='thead-light'>
                  <tr>
                    <th scope='col'>Date Ordered</th>
                    <th scope='col'>Delivered Address</th>
                    <th scope='col'>State</th>
                    <th scope='col'>Zip</th>
                    <th scope='col'>Delivery Date</th>
                    <th scope='col'># of Gallons</th>
                    <th scope='col'>Price Per Gallon</th>
                    <th scope='col'>Total Amount</th>
                  </tr></thead><tbody>";
                while($row = $result2->fetch_assoc()){
                    echo"
                  <tr><td> ".$row[order_date]. "</td>
                    <td> ".$row[address]. "</td>
                    <td> ".$row[state]. " </td>
                    <td> ".$row[zip]."</td>
                    <td> ".$row[c_month]."  /   ".$row[c_day]."   /   ".$row[c_year]."</td>
                    <td> ".$row[num_gallons]. " gallons </td>
                    <td> $".$row[price_per_gallon]." </td>
                    <td> $".$row[total_price]."</td>
                  </tr>";
                }
                echo "
                </tbody>
              </table>";
              }
            }
        }
    }
              ?>