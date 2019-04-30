<?php
$Conn_error ="Error in connection ";
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sistprojectsdb";


$Conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if (!mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName)) {
	header("location: ../dbh/500.html");
}


?>  