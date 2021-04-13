<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title>PISV-Admissions</Title>
    <link rel="stylesheet" href="css/admissions.css">
</head>

<body>
    <!-- navigation bar -->
    <div class="menu-bar">
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="admissions.php">Admmissions</a></li>
            <li><a href="teachers.php">Teachers</a></li>
            <li><a href=students.php>Students</a></li>
            <li><a href=noticeBoard.php>NoticeBoard</a></li>
        </ul>
    </div> 
    <!--query form for admission-->
    <div class="container">
        <div class="heading">
            <h2>Make a query. We will get back to you soon</h2>
        </div>
        <form action="" method="POST">
            <br>
            Name: <input type="text" name="name"><br><br>
            Address: <textarea name="addres" rows="10" cols="10"></textarea>
            Date of Birth: <input type="date" name="dob"><br><br>
            Gender: 
            <label for="male">Male</label><input type="radio" name="gender" value="male" class=radio_button> 
            <label for="female">Female</label><input type="radio" name="gender" value="female" class=radio_button> 
            <label for="other">Other</label><input type="radio" name="gender" value="other" class=radio_button><br><br>
		    <label for="class">Admisssion Seeking for Class: </label>
		    <select name="class" class="class">
		    <option value="KinderGarden">KinderGarden</option>
		    <option value="1">1</option>
		    <option value="2">2</option>
		    <option value="3">3</option>
		    <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11Science">11 Science</option>
            <option value="11Commerce">11 Commerce</option>
            <option value="11Arts">11 Arts</option>
            </select><br><br>
			<hr><br><br>
            Last Passed Class:<input type="text" name="lastClass">
            Passing Year:<input type="text" name="lastClassPassingYear"><br><br>
            Last School Name:<input type="text" name="lastSchool">
            Location:<input type="text" name="lastSchoolLocation">
			Board of last school:<input type="text" name="lastSchoolBoard">
			<br><br><hr><br><br>
            More about you: <textarea name="moreAboutYou" rows="10" cols="10"></textarea><br><br>
            <div class="submit">
                <input type="submit" value="Submit" class="btn" name="submit">
            </div>
        </form>
    </div>      
</body>
</html>



<?php
if(isset($_POST['name']))
{
    $name= $_POST['name'];
//if name == principal, user will be redirected to principal'sLogin page  
if($name != "principal")
{
    $server = "sql213.epizy.com";
    $username = "epiz_26756733";
    $password = "bABOSd0xwL";
    $dbname = "epiz_26756733_pisvunofficial";
    $addres= $_POST['addres'];
    $dob= $_POST['dob'];
	$gender= $_POST['gender'];
	$class= $_POST['class'];
    $lastClass= $_POST['lastClass'];
    $lastClassPassingYear= $_POST['lastClassPassingYear'];
    $lastSchool= $_POST['lastSchool'];
    $lastSchoolLocation= $_POST['lastSchoolLocation'];
    $lastSchoolBoard= $_POST['lastSchoolBoard'];
	$moreAboutYou= $_POST['moreAboutYou'];
	$con= mysqli_connect($server, $username, $password, $dbname);
    $sql= "insert into admissionquery(name, addres, dob, gender, class, lastClass, lastClassPassingYear, lastSchool, lastSchoolLocation, lastSchoolBoard, moreAboutYou) values('".$name."', '".$addres."', '".$dob."', '".$gender."', '".$class."', '".$lastClass."', '".$lastClassPassingYear."', '".$lastSchool."', '".$lastSchoolLocation."', '".$lastSchoolBoard."', '".$moreAboutYou."')";
    
    //inserting filled data into the database and confirming if its successfully inserted 
    if($con->query($sql) == true)
    {
        header("location:admisnQueryConfirm.php");
    }
    else
    {
        echo "ERROR: $sql <br> $con->error";
    }
    //closing the connection with the database
    $con->close(); 
}
else
{
    header("location:principalLogin.php");
}
}
?>