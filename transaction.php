<?php
    include ("includes/config.php");

    if(isset($_POST["confirm"]))
    {
        
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
        echo "Price = ".$_SESSION['price'];
    ?>
    <form action="transaction.php" method="POST">
        <label for="Password">Enter password to proceed Payment</label>
        <input type="password" name="Password">
        <button type="submit" name="confirm">Confirm</button>
    </form>

    
</body>