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
        echo "yehaw?";
        //header('location: register.php');
    }
}

?>