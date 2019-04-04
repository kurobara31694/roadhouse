<?php

$servername = "localhost";

$username = "user2";

$password = "Hershey@2018";

$db = "test2";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Yeet";


?>