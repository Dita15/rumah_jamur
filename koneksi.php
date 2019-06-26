<?php 

$localhost = "localhost";
$user = "root";
$password = "";
$dbName = "rumah_jamur";

$conn = mysqli_connect($localhost, $user, $password, $dbName);
if(!$conn){
	"Connection:Failed" .mysqli_connect_error();
}

?>