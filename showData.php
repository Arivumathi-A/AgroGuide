<!DOCTYPE html>
<html>
<head>
	<title>Table</title>
	<style>
		.t
		{
			border-collapse: collapse;
			border: 1px solid #2980b9;
		}
		#c,#cx
		{
			position: relative;
			top: 1.5em;
		}
	</style>
</head>
<body>
	<?php
	include("includes/config.php");
    $row="";
	$sql4="SELECT * FROM farmer_details ";
	$res4=mysqli_query($con,$sql4);
	if($res4)
	{
		echo "<table class='t'>";
		echo "<tr>";
		echo "<th>username</th>";
		echo "<th>phone_no</th>";
		echo "<th>MOF</th>";
		echo "<th>crop</th>";
		echo "<th>landarea</th>";
		echo "</tr>";
	    while($row = mysqli_fetch_assoc($res4))
	    {
	    	echo "<tr>";
	    	echo "<td class='t'>".$row["username"]."</td>";
	    	echo "<td class='t'>".$row["phone_no"]."</td>";
	    	echo "<td class='t'>".$row["MOF"]."</td>";
	    	echo "<td class='t'>".$row["crop"]."</td>";
	    	echo "<td class='t'>".$row["land_area"]."</td>";
	    	echo "</tr>";
	    }
	    echo "</table>";
	}    
	mysqli_close($con);	
	?>
</body>
</html>