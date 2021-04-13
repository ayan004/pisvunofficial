<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Confirm(Notice)</title>
    <link rel="stylesheet" href="css/delConfirmTeacher.css">
</head>
<body>
    
</body>
</html>

<?php
session_start();
$noticeNo = $_SESSION["noticeNo"];
$heading = $_SESSION["heading"];
$notice = $_SESSION["notice"];

//connecting to the database
$server = "sql213.epizy.com";
$username = "epiz_26756733";
$password = "bABOSd0xwL";
$dbname = "epiz_26756733_pisvunofficial";
$con = mysqli_connect($server, $username, $password, $dbname);
$sql = "select * from notices where noticeNo=".$noticeNo;
$res = mysqli_query($con,$sql);
$r = mysqli_fetch_assoc($res);  
if($r == null)
{
    //if deleted earlier then showing a messsage
    echo "Notice No. ".$noticeNo."<br>";
    echo "Heading- ".$heading."<br>";
    echo "Notice- ".$notice."<br>";
    echo "This notice is already deleted..Rather refreshing the page..Go Back";
}
else
{
    //deleting the entry from the database
    $sql1 = "delete from notices where noticeNo=".$noticeNo;
    if($con->query($sql1) == true)
    {
        echo "Notice No. ".$noticeNo."<br>";
        echo "Heading- ".$heading."<br>";
        echo "Notice- ".$notice."<br>";
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
echo "<button><a href='/pisv/deleteNotice.php' >
Go Back
</a></button>";

?>