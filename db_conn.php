<?php

session_start();

$username = "";

$password = "";

$error=array();
// Create connection
$dbconn = mysqli_connect('localhost', 'root', '','ash');

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
      if ($user['username'] === $username) {
        array_push($error, "username already in database");
      }
    } 
    //if no errors then we can do stuff
    if(count($error)==0){
        $query="INSERT INTO log (user_name,password)
        VALUES('$username','$password')";
        mysqli_query($dbconn,$query);
        $_SESSION['user_name']=$username;
        $_SESSION['sucessful']="Yall are logged in now yehaw";
        header('location: register.php');
    }
}

?>