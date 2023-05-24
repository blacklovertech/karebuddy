

<?php

$dbhost_name = "containers-us-west-52.railway.app:6490";
$database = "railway";// database name
$username = "root"; // user name
$password = "HHLmF90ClybDFOSeZwbH"; // password 

//////// Do not Edit below /////////
try {
$dbo = new PDO("mysql:host=$dbhost_name;dbname=$database", $username, $password); 
  } catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$conn = mysqli_connect("$dbhost_name","$username","$password","$database" ) or die ("error" . mysqli_error($conn));
