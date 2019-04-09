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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">

  <!-- Our stylesheet -->
  <link rel="stylesheet" href="resources/style.css">
  
  <title>HOME PAGE</title> 
  
</head>

<body>
  <div class="container" id="main">

    <h1>______________________ </h1>
    <h2>POTATOES</h2>

    <div class="container" id="login-section">
      <form method="post" action="login.php" >

          <div class="input-group">
            <label></label>
            <p>What a wonderful page, look at all the lack of CONTENT!!!!! </p>
          </div>
     </form>

     <div class="container">

     <?php 
  
  echo $_SESSION['user_name'];
  echo nl2br(", welcome.\r\n");
  $uname=$_SESSION['user_name'];
 
  
  $query="SELECT * FROM log
  WHERE user_name='$uname' ";
  echo "---Current User Information--- ";
  if ($result = $dbconn->query($query)) {
 
    while ($row = $result->fetch_assoc()) {
      $field1name = $row["full_name"];
      $field2name = $row["city"];
      $field3name = $row["state"];
      $field4name = $row["zip"];

      echo nl2br("\r\nName: ");
      echo $field1name;
      
      echo nl2br("\r\nState: ");
      echo $field3name;
      echo nl2br("\r\nCity: ");
      echo $field2name;
      echo nl2br("\r\nZip: ");
      echo $field4name;
    }
  }
  ?>

     </div>

         
      <a href="login.php">Don't wanna be here? LEAVE!</a>
      <a href="register.php">wanna register more information?</a>
    </div>

  </div>

</body>

</html>