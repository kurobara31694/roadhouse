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
  <link rel="stylesheet" href="resource/styles.css">

  <title>Complete Your Profile</title>
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
            <a class="nav-item nav-link active" href="wel.php" >Fuel Calculator <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="fuelhist.php" >Fuel History</a>
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
<?php
if(!empty($_SESSION['user_name'])){
  ?>
  <form method= "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin-top: 50px" class="input-group">
    <div class="container">
      <h1>Complete Your Profile</h1>
      <h2>Fill out the information and finish creating account!</h2>

      <label> Full Name</label>
      <div class="input-group">
      <input class="form-control" type="text" name="fullname" placeholder="Please enter full name. Ex: Bill B. Baggins">
      </div>

      <label> Address</label>
      <div class="input-form">
      <input class="form-control" type="text" name="address1" placeholder="Please enter address. Ex:123 Gondor Dr.">
      </div> 

      <label>City</label>
      <div class="input-group">
      <input  class="form-control" type="text" name="city">
      </div>

      <label>State</label>
      <?php
      		$states	= array(
            "AL" => "Alabama",
            "AK" => "Alaska",
            "AZ" => "Arizona",
            "AR" => "Arkansas",
            "CA" => "California",
            "CO" => "Colorado",
            "CT" => "Connecticut",
            "DE" => "Delaware",
            "FL" => "Florida",
            "GA" => "Georgia",
            "HI" => "Hawaii",
            "ID" => "Idaho",
            "IL" => "Illinois",
            "IN" => "Indiana",
            "IA" => "Iowa",
            "KS" => "Kansas",
            "KY" => "Kentucky",
            "LA" => "Louisiana",
            "ME" => "Maine",
            "MD" => "Maryland",
            "MA" => "Massachusetts",
            "MI" => "Michigan",
            "MN" => "Minnesota",
            "MS" => "Mississippi",
            "MO" => "Missouri",
            "MT" => "Montana",
            "NE" => "Nebraska",
            "NV" => "Nevada",
            "NH" => "New Hampshire",
            "NJ" => "New Jersey",
            "NM" => "New Mexico",
            "NY" => "New York",
            "NC" => "North Carolina",
            "ND" => "North Dakota",
            "OH" => "Ohio",
            "OK" => "Oklahoma",
            "OR" => "Oregon",
            "PA" => "Pennsylvania",
            "RI" => "Rhode Island",
            "SC" => "South Carolina",
            "SD" => "South Dakota",
            "TN" => "Tennessee",
            "TX" => "Texas",
            "UT" => "Utah",
            "VT" => "Vermont",
            "VA" => "Virginia",
            "WA" => "Washington",
            "WV" => "West Virginia",
            "WI" => "Wisconsin",
            "WY" => "Wyoming",
            "DC" => "Washington D.C."
          );
          ?>
      <select name="state" class="form-control" required>
          <option value="">Select State</option>
          <?php
          foreach ($states as $stateAbbr => $state) {
            $selected = (isset($getState) && $getState == $stateAbbr) ? 'selected' : '';
            echo '<option ' . $selected . ' value="' . $stateAbbr . '">' . $state . '</option>';
          }
          ?>
      </select>
      <!--<input  class="form-control" type="text" name="state">-->

      <label>Zipcode</label>
      <div class="input-group">
      <input class="form-control" type="text" name=zipcode>
      </div>

      <button type="submit" class="btn btn-primary mt-3 m-1" name="register">Submit</button>
      <br>
    </div>
  </form>
        <?php } else{

          echo '<h1 id="msg"align="center" STYLE="font-size: 35pt" >Sorry No Account! <br> <SPAN STYLE="font-size: 15pt">Please Log in or Sign up</span></h1>';

        }
        
        ?>
</body>

</html>