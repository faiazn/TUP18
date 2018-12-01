<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel
    </title>
</head>


<style type="text/css">
	body{
		text-align: center;
        background-color: black;
        color: white
	}
	table{
		margin: 0 auto
	}
</style>
<body>
<h1>Travel Agency Admin Panel</h1>
<h2>Guest and Airlines Details</h2>
<?php

$dsp  = mysqli_query($dbcon, "SELECT * from guest ");



echo "<table border=1px>";
echo "<tr>";
echo "<th>";
echo "Name";
echo "</th>";
echo "<th>";
echo "Phone Number";
echo "</th>";
echo "<th>";
echo "Airline";
echo "</th>";
echo "<th>";
echo "From";
echo "</th>";
echo "<th>";
echo "To";
echo "</th>";
echo "<th>";
echo "Number of Seat";
echo "</th>";
echo "</tr>";
while ($result = mysqli_fetch_array($dsp, MYSQLI_ASSOC)) {
    
    echo "<tr>";
    
    echo "<td>" . $result['Name'] . "</td>";
    echo "<td>" . $result['phnno'] . "</td>";
    echo "<td>" . $result['airline'] . "</td>";
    echo "<td>" . $result['start'] . "</td>";
    echo "<td>" . $result['end'] . "</td>";
    echo "<td>" . $result['seat'] . "</td>";
    echo "</tr>";
}
echo "<table>";


?>
<h2>Car Rent Details</h2>
<?php

$dsp  = mysqli_query($dbcon, "SELECT * from carcustomer");



echo "<table border=1px>";
echo "<tr>";
echo "<th>";
echo "Name";
echo "</th>";
echo "<th>";
echo "Date";
echo "</th>";
echo "<th>";
echo "Phone Number";
echo "</th>";
echo "<th>";
echo "Area";
echo "</th>";
echo "<th>";
echo "Hotel Name";
echo "</th>";
echo "</tr>";
while ($result = mysqli_fetch_array($dsp, MYSQLI_ASSOC)) {
    
    echo "<tr>";
    
    echo "<td>" . $result['name'] . "</td>";
    echo "<td>" . $result['date'] . "</td>";
    echo "<td>" . $result['phoneno'] . "</td>";
    echo "<td>" . $result['area'] . "</td>";
    echo "<td>" . $result['hotel'] . "</td>";
    echo "</tr>";
}
echo "<table>";


?>
<h2>Hotel Available Seat Details</h2>
<?php

$dsp  = mysqli_query($dbcon, "SELECT * from hotel");



echo "<table border=1px>";
echo "<tr>";
echo "<th>";
echo "Area";
echo "</th>";
echo "<th>";
echo "Hotel Name";
echo "</th>";
echo "<th>";
echo "No. of seat";
echo "</th>";

echo "</tr>";
while ($result = mysqli_fetch_array($dsp, MYSQLI_ASSOC)) {
    
    echo "<tr>";
    
    echo "<td>" . $result['end'] . "</td>";
    echo "<td>" . $result['hotel'] . "</td>";
    echo "<td>" . $result['seat'] . "</td>";
    
    echo "</tr>";
}
echo "<table>";


?>

</body>
</html>
