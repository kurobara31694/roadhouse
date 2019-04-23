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

</body>

</html>