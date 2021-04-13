<!DOCTYPE html>
<html lang="en">
<head><title>Principal Login Form</title></head>
<body>
<form method="POST">
	Username: <input type="text" name="username"><br><br>
	Password: <input type="password" name="password"><br><br>
	<input type="submit" value="Log In">
</form>
</body>
</html>

<?php
if($_POST)
{
    $server = "sql213.epizy.com";
    $dbusername = "epiz_26756733";
    $dbpassword = "bABOSd0xwL";
    $dbname = "epiz_26756733_pisvunofficial";
    $con= mysqli_connect($server, $dbusername, $dbpassword, $dbname);   
    $username= $_POST['username'];
    $password= $_POST['password'];
	$sql= "select username,password from principal";
	$res= mysqli_query($con,$sql);
	$r= mysqli_fetch_assoc($res);
	if($username == $r['username'])
	{
        if($password == $r['password'])
        {
            header("location:addVsDelete.php");
        }
        else
        {
            echo "Password don't match";
        }
    }
    else
    {
        echo "username not matched";    
    }
}
?>              