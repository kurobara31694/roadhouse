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

  <title>HOME PAGE</title>

</head>

<body>

  <main class="container">

    <?php

    echo "<h1> User ".$_SESSION['user_name']. " logged in.\r\n </h1>";
    $uname = $_SESSION['user_name'];
    $fuel_userId = $_SESSION['user_id'];


    $query1 = "SELECT * FROM log WHERE user_name='$uname'";
    // $query2 = "SELECT user_id FROM fuelcalc where user_id ='$fuel_userId'";
    
    echo "---Current User Information--- ";

    // if ($result2 = $dbconn->query($query2)){
    //   while ($row = $result2->fetch_assoc()){
    //     $userID = $row["user_id"];
    //     echo "<h5> User id from fuelcalc table is ".$userID."</h5>";
    //   }
    // }


    if ($result1 = $dbconn->query($query1)) {

      while ($row = $result1->fetch_assoc()) {
        $field1name = $row["full_name"];
        $field2name = $row["city"];
        $field3name = $row["state"];
        $field4name = $row["zip"];
        $userID = $row['user_id'];

        echo nl2br("\r\nName: ".$field1name);

        echo nl2br("\r\nState: ".$field3name);

        echo nl2br("\r\nCity: ".$field2name);

        echo nl2br("\r\nZip: ".$field4name);
        
        echo nl2br("\r\nUser ID: ".$userID);
      }
    }


    ?>


    <div class="container" id="buttons">

      <a href="login.php">Don't wanna be here? LEAVE!</a>
      <a href="register.php">wanna register more information?</a>
    </div>

  </main>

</body>

</html>