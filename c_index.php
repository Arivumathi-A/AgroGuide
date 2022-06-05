<?php
    include("includes/config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shop now!</title>
        <style>
            #customers {
  			font-family: Arial, Helvetica, sans-serif;
  			border-collapse: collapse;
  			width: 100%;
			}	

		#customers td, #customers th {
  			border: 1px solid #ddd;
  			padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
  		padding-top: 12px;
  		padding-bottom: 12px;
  		text-align: left;
  		background-color: #04AA6D;
  		color: white;
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
                        echo "<table id='customer'>";
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
            <?php
            $r="";
            $sql5="SELECT crop from product group by crop";
            $res5=mysqli_query($con,$sql5);
            echo "<select id='sel'>";
            while($r = mysqli_fetch_assoc($res5))
            {
                echo "<option value=>".$r["crop"]."</option>";
            }
            echo "</select>";
            ?>
            <br>
            <label for="qty">Quantity</label>
            <input type="text" name="qty"><br>
            <input type="submit" name="buy" value="Buy">
        </form>
    </body>
</html>