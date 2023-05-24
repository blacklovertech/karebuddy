

<?php

$dbhost_name = "localhost";
$database = "notes";// database name
$username = "root"; // user name
$password = ""; // password 

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$conn = mysqli_connect("$dbhost_name","$username","$password","$database" ) or die ("error" . mysqli_error($conn));

