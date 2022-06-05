<!DOCTYPE html>
<html>
<head>
	<title>Table</title>
	<style>
		.t
		{	border-collapse: collapse;
			border: 1px solid #2980b9;
		}
		
		#c,#cx
		{
			position: relative;
			top: 1.5em;
		}
		#d
		{
			display: none;
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
	?>
	<input type="button" id='button' value = "Show" onclick="FbotonOn()">
	<div id="d">
		<h2>Suggestion box</h2>
		<h4>The crop suggested for you is</h4>
		<p id="txt"></p>
	</div>
	<?php
	 	$sql5="SELECT * from min_crop where land_area = ( SELECT min(land_area) from min_crop)";
		$res5=mysqli_query($con,$sql5);
		mysqli_close($con);
	?>
	<script type="text/javascript">
		const divele = document.getElementById("d");
    	const para = document.getElementById("txt");
    	function FbotonOn() 
    	{ 

        	divele.style.display="block";
        	para.innerHTML="<?php 
								while($r = mysqli_fetch_assoc($res5))
								{
									echo $r["crop"];
								}	 
							?>";
		}
	</script>
</body>
</html>