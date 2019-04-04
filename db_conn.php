<?php

session_start();

$username = "";

$password = "";

$error=array();
// Create connection
$dbconn = mysqli_connect('localhost', 'root', '','ash');
//check the connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//we want to signup first so we would have a user 
//input thier email and password
if(isset($_POST['signup'])){
    $username =mysqli_real_escape_string($dbconn,$_POST['username']);
    $password =mysqli_real_escape_string($dbconn,$_POST['password']);

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }

    $user_check_query = "SELECT * FROM log WHERE user_name ='$username' LIMIT 1";
    $result = mysqli_query($dbconn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['user_name'] == $username) {
        array_push($error, "username already in database");
        echo "user name already taken, pick another."; 
      }
    } 
    //if no errors then we can do stuff
    if(count($error)==0){
        $query = "INSERT INTO log (user_name,full_name,password,address,city,state,zip) VALUES('$username','','$password','','','','')";
        mysqli_query($dbconn,$query);

        if ($dbconn->query($query) == TRUE) {
          echo "New record created successfully";
          } else {
          echo "Error: " . $query . "<br>" . $dbconn->error;
         }

        $_SESSION['user_name']= $username;
        $_SESSION['sucessful']= "Yall are logged in now yehaw";
        //echo "yehaw?";
        //header('location: register.php');
    }
}

//we wanna login somebody to thier account
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($dbconn, $_POST['username']);
  $password = mysqli_real_escape_string($dbconn, $_POST['password']);

  if (empty($username)) {
  	array_push($error, "Username is required");
  }
  if (empty($password)) {
  	array_push($error, "Password is required");
  }

  if (count($error) == 0) {
  	$password = $password;
    $result='';
    $row_cnt='';
    if ($result = $dbconn->query("SELECT * FROM log WHERE user_name='$username' AND password='$password'")) {

      /* determine number of rows result set */
      $row_cnt = $result->num_rows;
  
      printf("Result set has %d rows.\n", $row_cnt);
  
      /* close result set */
      //$result->close();
     }
     echo "here comes the count: ";
     print_r($row_cnt);

  	if ($row_cnt == 1) {
  	  $_SESSION['user_name'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: wel.php');
  	 }else {
      array_push($error, "Wrong username/password combination");
      echo "       WRONG USER NAME OR PASSWORD, SORRY  :(     ";
  	}
  }
}

//if we want somebody to be able to register thier information


?>