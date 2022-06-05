<?php
    include("includes/config.php");
    $user = $_SESSION['userLoggedIn'];

    $q = '';
    if (isset($_POST['pnqReport'])){
        $price = (int)$_POST['price'];
        $quantity = (int)$_POST['qnty'];
        $cp = $_POST['crop'];

        $query = mysqli_query($con, "select * from product where username = '$user' and crop = '$cp';");

        if (mysqli_num_rows($query) == 1) {
            $q = 'success';
            $query2 = mysqli_query($con, "update product set price = $price, qty_avail = $quantity where username = '$user' and crop = '$cp';");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Feed in details</title>
        <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    </head>
    <body>
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form action="harvest_completed.php" method="POST">
                    <h2 style="color:blue;">Harvest details</h2>
                    <label for="crop">Crop</label>
                    <input type="text" name="crop"><br>
                    <label for="price">price</label>
                    <input type="text" name="price"><br>
                    <label for="qnty">Quantity being provided</label>
                    <input type="text" name="qnty"><br>
                    <input type="submit" value="Submit" name="pnqReport">
                </form>
            </div>
        </div>
    </div>            
        <?php echo $q; ?>
    </body>
</html>