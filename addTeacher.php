<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
</head>
<body>
    <h2>Add a Teacher: </h2><br>
    <form action="" method="post">
        Teacher's Name: <input type="text" name="name"><br><br>
        Designation: <input type="text" name="designation"><br><br>
        Phone: <input type="phone" name="phone"><br><br>
        Addres: <textarea name="addres" id="addres" cols="30" rows="10"></textarea><br><br> 
        <input type="submit" value="Submit"><br><br>
        <input type="submit" value="Go Back" name="goBack">
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
        $name= $_POST['name'];
        $designation= $_POST['designation'];
        $phone= $_POST['phone'];
        $addres= $_POST['addres'];
        $con= mysqli_connect($server, $username, $password, $dbname);
        $sql= "insert into teachers(name, designation, phone, addres) values('".$name."', '".$designation."', 
	    '".$phone."', '".$addres."')";

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

<!-- 1. Create the form
2. Create the database -->