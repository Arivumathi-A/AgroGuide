<?php
    include("includes/config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shop now!</title>
        <style>
		.t
		{	border-collapse: collapse;
			border: 1px solid #2980b9;
		}
	</style>
    </head>
    <body>
        <?php
                    $row="";
                    $sql4="SELECT crop,avg(price) as price,sum(qty_avail) as qty from product group by crop";
                    $res4=mysqli_query($con,$sql4);
                    if($res4)
                    {
                        echo "<table class='t'>";
                        echo "<tr>";
                        echo "<th>Crop</th>";
                        echo "<th>price</th>";
                        echo "<th>Quantity</th>";
                        echo "</tr>";
                        while($row = mysqli_fetch_assoc($res4))
                        {
                            echo "<tr>";
                            echo "<td class='t'>".$row["crop"]."</td>";
                            echo "<td class='t'>".$row["price"]."</td>";
                            echo "<td class='t'>".$row["qty"]."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }    
        ?>
        <form action="payment.php" method="post">
            <select id="crop">
                
            </select>
        </form>
    </body>
</html>