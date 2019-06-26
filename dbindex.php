<?php
require_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rumah Jamur</title>
    <style>
        h1 {
            color: white;
            font-size: 3em;
            background-color: black
        }
    </style>
</head>

<body>
<h1 align="center">Sensor Rumah Jamur</h1>
<table border="1" align="center">
  <thead>
      <td>Waktu</td>
      <td>temp</td>
      <td>Humidity</td>
  </thead>
<?php
$hasil= mysqli_query($con, "SELECT datasensor.waktu, datasensor.temp, datasensor.humadity FROM datasensor") ;
while ($data = mysqli_fetch_array ($hasil)){
  echo "    
         <tr>
         <td>".$data['waktu']."</td>
         <td>".$data['temp']."</td>
         <td>".$data['humadity']."</td>
         </tr> 
         ";
         
 }
 ?>
</table>
</body>
</html>