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

  <title>Fuel History</title>

</head>

<body>

<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-primary justify-content-between">
<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
<a class="navbar-brand" href="#">
    <img src="icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    Fellowship
  </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
            <a class="nav-item nav-link " href="wel.php" >Fuel Calculator <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link active" href="fuelhist.php" >Fuel History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Edit Profile</a>
            </li>
</div>

      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">

      <li class="nav-item active">
        <?php
        if(!empty($_SESSION['user_name'])){
        echo '<a class="nav-item nav-link active">
        Hi ' .$_SESSION['user_name']. '!</a>';
      } else{
        echo '<a class="nav-item nav-link active">
        Hi Guest!<span class="sr-only">(current)</span></a>';
    }
        ?>
      </li>
       <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 pull-right">
      <?php
      if(!empty($_SESSION['user_name'])) {
      ?>
   <a class="btn btn-danger my-2 my-sm-0" href="logout.php">Log Out</a>
   <?php
          }  else {
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

  <main class="container">

  <?php
    $uname = $_SESSION['user_name'];

    $query1 = "SELECT user_id FROM log WHERE user_name='$uname'";

    if(!empty($_SESSION['user_name'])){
      // Information from Login Table
    if ($result1 = $dbconn->query($query1)) {

      while ($row = $result1->fetch_assoc()) {
        $userID = $row["user_id"];
    
        $query2 = "SELECT * FROM FuelHistory WHERE user_id='$userID'";
        if ($result2 =$dbconn->query($query2)) {
            if ($result2->num_rows > 0) {
                echo "
                <h1>Fuel History</h1>
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
                  <tr><td> ".$row["order_date"]. "</td>
                    <td> ".$row["address"]. "</td>
                    <td> ".$row["state"]. " </td>
                    <td> ".$row["zip"]."</td>
                    <td> ".$row["c_month"]."  /   ".$row["c_day"]."   /   ".$row["c_year"]."</td>
                    <td> ".$row["num_gallons"]. " gallons </td>
                    <td> $".$row["price_per_gallon"]." </td>
                    <td> $".$row["total_price"]."</td>
                  </tr>";
                }
                echo "
                </tbody>
              </table>";
              } else{
                echo "<h1 id=msg >No History</h1>";
              }
            }
        }
    }
  } else {

    echo '<h1 id="msg"align="center" STYLE="font-size: 35pt" >Oops! Not Logged in! <br> <SPAN STYLE="font-size: 15pt">Please Sign up or sign in</span></h1>';

  }

              ?>
</body>

</html>