<?php
    include('includes/config.php');
    if (isset($_SESSION['userLoggedIn'])){
        $userLoggedIn = $_SESSION['userLoggedIn'];
    }
    else {
        header('Location: register.php');
    }
?>

<?php
    $msg = '';
    if (isset($_POST["addDataSubmit"])) {
        $un = $_POST["uname"];
        $pn = $_POST["phNo"];
        $mof = $_POST["MOF"];
        $cp = $_POST["crop"];
        $la = $_POST["landArea"];
        
        $status = mysqli_query($con, "INSERT INTO farmer_details values ('$un', '$pn', '$mof', '$cp', '$la')");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add your Data</title>
    <link rel="stylesheet" type="text/css" href="assets/css/adddata.css">
    <style>
        #successmsg
        {
            font-size: 30px;
            color: blue;
        }
    </style>    
</head>
<body>
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">  
            <h2 id="msg">Enter user details</h2>  
                <form id="loginform" action="" method="POST">
                    <label for="uname">User Name</label>
                    <input type="text" name="uname" placeholder="e.g. bartSimpson" required><br>

                    <label for="phNo">Phone Number</label>
                    <input type="text" name="phNo" pattern="[1-9]{1}[0-9]{9}" placeholder="e.g. 1234567890" required><br>

                    <label for="MOF">Method of Farming</label>
                        <!-- <select name="MOF" id="select-button" style="
                        width:100%;
                        padding:3px;
                        
                        background-color: transparent;
                        border: 2px solid rgb(0, 0, 0);
                        border-radius: 250px;
                        color: rgb(0, 0, 0);
                        margin: 20px auto;
                        display: block;
                        height: 35px;
                        letter-spacing: normal;
                        font-size: 20px;
                        text-align:center;"
                        >
                            <option value="Organic">Organic</option>
                            <option value="Inorganic">Inorganic</option>
                        </select> -->
                    <input type="text" name="MOF" placeholder="e.g. " required><br>

                    <label for="crop">Crop</label>
                    <input type="text" name="crop" placeholder="e.g. bartSimpson" required><br>

                    <label for="crop">Land Area</label>
                    <input type="text" name="landArea" placeholder="e.g. bartSimpson" required><br>

                    <button name="addDataSubmit">Submit</button>
                </form>
            </div>
        </div>
        <div id="result">
            <?php echo $msg; ?>
        </div>
    </div>
</body>
</html>