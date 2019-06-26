
<!DOCTYPE html>
<html>

<?php
echo "Access OK";
echo "<br>"; //newline

if (isset($_GET['temp'])){
	$temp = $_GET['temp'];
	echo $temp;
}
else{
	echo "Data not received";
}

if (isset($_GET['humadity'])){
	$humadity = $_GET['humadity'];
	echo $humadity;
}
else{
	echo "Data not received";
}


//Connect to database
include ("koneksi.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO datasensor (temp, waktu, humadity)
VALUES ('".$_GET["temp"]."',now(),'".$_GET["humadity"]."')";

if ($conn->query($sql) === TRUE) {
	echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
	} else {
	echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
	}

$conn->close();

?>

?>

</html>