<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addVsDelete.css">
    <title>Add Notice</title>
</head>
<body>
    <h2>Add a Notice: </h2><br>
    <form action="" method="post">
        Heading: <input type="text" name="heading"><br><br>
        Notice: <textarea name="notice" id="notice" cols="30" rows="10"></textarea><br><br> 
        <button name="submit" value="submit" class="btn">Submit</button><br><br>
        <button name="goBack" value="goBack" class="btn">Go Back</button>
    </form>
</body>
</html>



<?php
if($_POST)
{
    $server = "sql213.epizy.com";
    $username = "epiz_26756733";
    $password = "bABOSd0xwL";
    $dbname = "epiz_26756733_pisvunofficial";
    if(isset($_POST['goBack']))
    {
        header("location:/pisv/addVsDelete.php");
    }
    else
    {
        $heading= $_POST['heading'];
        $notice= $_POST['notice'];
        $con= mysqli_connect($server, $username, $password, $dbname);
        $sql= "insert into notices(heading, notice) values('".$heading."', '".$notice."')";

        //inserting filled data into the database and confirming if its successfully inserted 
        if($con->query($sql) == true)
        {
            echo "<br><br>Data inserted successfully";
        }
        else
        {
            echo "ERROR: $sql <br> $con->error";
        }
        //closing the connection with the database
        $con->close();
    }
}
?> 