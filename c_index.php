<?php
    include("includes/config.php");
    
    $err = '';
    $qtyErr = '';
    $total = '';
    $user = '';
    if (isset($_POST["buy"])) {
        $cp = $_POST['crop'];
        $qty = $_POST['qty'];
        $user = $_SESSION['userLoggedIn'];

        echo $user;

        $query = mysqli_query($con, "select crop from product where crop = '$cp' and qty_avail >= $qty");

        if (mysqli_num_rows($query) < 1) {
            $err = "Please check the available quantity";
        }
        else {
            $_SESSION['crop_ordered'] = $cp;
            $_SESSION['crop_quantity'] = $qty;
            $query2 = mysqli_query($con, "select * from product where crop = '$cp'");
            $row1 = mysqli_fetch_assoc($query2);

            $query4 = mysqli_query($con, "select * from consumer_login where username='$user'");
            $row = mysqli_fetch_assoc($query4);
            $cid = $row['id'];

            $total = $qty * $row1["price"];
            $qtyErr = '';

            $q3 = mysqli_query($con, "INSERT INTO orders (o_id, crop, c_id, qty, amount) VALUES ('', '$cp', $cid, $qty, $total)");
            $qty_total = $row1['qty_avail'];
            $resQty = $qty_total - $qty;
            $_SESSION['qty_remaining'] = $resQty;
            $_SESSION['price'] = $total;

            if ($resQty > 0) {
                header("Location: transaction.php");
            }
            else {
                $qtyErr = 'Entered quantity is more than available quantity';
            }
        }
    }
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

            #customers tr:nth-child(even){
                background-color: #f2f2f2;
            }

            #customers tr:hover {
                background-color: #ddd;
            }

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
                $sql4="SELECT * from warehouse";
                $res4=mysqli_query($con,$sql4);
                if($res4)
                {
                    echo "<table id='customers'>";
                    echo "<tr>";
                    echo "<th>Crop</th>";
                    echo "<th>Quantity</th>";
                    echo "</tr>";
                    while($row = mysqli_fetch_assoc($res4))
                    {
                        echo "<tr>";
                        echo "<td class='t'>".$row["crop"]."</td>";
                        echo "<td class='t'>".$row["quantity"]."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
        ?>
        <form action="c_index.php" method="post">
            <?php
            $r="";
            $sql5="SELECT crop from product group by crop";
            $res5=mysqli_query($con,$sql5);
            echo "<select id='sel' name='crop'>";
            while($r = mysqli_fetch_assoc($res5))
            {
                $ele = $r["crop"];
                echo "<option value='$ele'>".$ele."</option>";
            }
            echo "</select>";
            ?>
            <br>
            <label for="qty">Quantity</label>
            <input type="text" name="qty"><br>
            <input type="submit" name="buy" value="Buy"><br>
            <?php 
                echo $err;
                echo $qtyErr;
            ?>
        </form>
    </body>
</html>