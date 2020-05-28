<?php

$con=mysqli_connect("localhost","root","","event");
$sql="SELECT * FROM login";
$record=mysqli_query($con,$sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
	<link rel="stylesheet" type="text/css" href="css/admin2.css">
	<style>a:hover{background-color:blue;}</style>
</head>
<body>
	<div style="overflow-x: auto;">
	<h1><center>REGISTERED DATA:</center></h1>
	<a style="color:black; margin:0 0 0 1080px; font-size:22px ;font-family: 'Lucida Sans';" href="chart.php"><b><i>TYPE ANALYSIS</i></b></a>
	<br><br>
	<table width="700" border="1" cellpadding="1" cellspacing="1">
		<tr>
			<th>Registration Id</th>
			<th>Name</th>
			<th>Phone No.</th>
			<th>Email ID</th>
			<th>Registration Type</th>
			<th>Ticket</th>
			<th>ID Card</th>
			<th>Date</th>
		</tr>
		<?php
		while($user=mysqli_fetch_assoc($record)){
			echo "<tr>";
			echo "<td>".$user['id']."</td>";
			echo "<td>".$user['name']."</td>";
			echo "<td>".$user['mobile']."</td>";
			echo "<td>".$user['email']."</td>";
			echo "<td>".$user['type']."</td>";
			echo "<td>".$user['ticket']."</td>";
			echo "<td>".$user['image']."</td>";
			echo "<td>".$user['date']."</td>";
			

			echo "</tr>";
		}

		?>
	</table>
	<br><br>
	<form method="get" action="adminlogin.php">
	<center><button style="border-radius: 6px; width: 150px;line-height: 32px;	padding:0 10px; font-size:16px;" >Logout</button></center>
<br><br><br></div></form>
</body>
</html>