<?php
    include ("includes/config.php");

    if(isset($_POST["confirm"]))
    {
        $password = $_POST['Password'];
        $user = $_SESSION['userLoggedIn'];
        $remqty=$_SESSION['qty_remaining'];
        $cp=$_SESSION['crop_ordered'];
        $query = mysqli_query($con, "select * from consumer_login where username = '$user'");
        $row = mysqli_fetch_assoc($query);
        $pwd=md5($password);
        if($pwd==$row["password"])
        {
            $query = mysqli_query($con,"update product set qty_avail=$remqty where crop = '$cp'");
        }
        else
        {
            echo "Failed";
        }
    }
?>
<!doctype html>
<head>
    <title>Payment      
    </title>
</head>
<body>
    <?php
        echo "Crop = ".$_SESSION['crop_ordered'];
        echo "Crop Quantity= ".$_SESSION['crop_quantity'];
        echo "Remaining quantity =".$_SESSION['qty_remaining'];
        echo "Price = ".$_SESSION['price'];
    ?>
    <form action="transaction.php" method="POST">
        <label for="Password">Enter password to proceed Payment</label>
        <input type="password" name="Password">
        <button type="submit" name="confirm">Confirm</button>
    </form>

    
</body>