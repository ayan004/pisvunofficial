<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Confirm(Teacher)</title>
    <link rel="stylesheet" href="css/delConfirmTeacher.css">
</head>
<body>
    
</body>
</html>


<?php
session_start();
$sno = $_SESSION["sno"];
$name = $_SESSION["name"];
$designation = $_SESSION["designation"];
$phone = $_SESSION["phone"];

//connecting to the database
$server = "sql213.epizy.com";
$username = "epiz_26756733";
$password = "bABOSd0xwL";
$dbname = "epiz_26756733_pisvunofficial";
$con = mysqli_connect($server, $username, $password, $dbname);
$sql = "select * from teachers where sno=".$sno;
$res = mysqli_query($con,$sql);
$r = mysqli_fetch_assoc($res);    
if($r == null)
{
    //if deleted earlier then showing a messsage
    echo "Sno- ".$sno."<br>";
    echo "Name- ".$name."<br>";
    echo "Designation- ".$designation."<br>";
    echo "Phone- ".$phone."<br>";
    echo "Your selection already deleted..Rather refreshing the page..Go Back";
} 
else
{
    //deleting the entry from the database
    $sql1 = "delete from teachers where sno=".$sno;
    if($con->query($sql1) == true)
    {
        echo "Sno- ".$sno."<br>";
        echo "Name- ".$name."<br>";
        echo "Designation- ".$designation."<br>";
        echo "Phone- ".$phone."<br>";
        echo "Deleted successfully";
    }   
    else
    {
        echo "ERROR: $sql <br> $con->error";
    }
}

//closing the connection with the database
$con->close();


echo"<br><br>";
echo "<button><a href='/pisv/deleteTeacher.php' >
Go Back
</a></button>";

?>