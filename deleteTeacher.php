<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Teacher</title>
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
    <!-- body of the page -->
    <div id="notes" class="row container-fluid">
        <!-- will be created dynamically by the JavaScript -->
    </div>
    <form method="post">
        <input type="submit" value="Go Back" name="goBack">
    </form>

    <!-- bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>


<?php

//extracting data from mysql and converting the extracted table into array
$server = "sql213.epizy.com";
$username = "epiz_26756733";
$password = "bABOSd0xwL";
$dbname = "epiz_26756733_pisvunofficial";
$con= mysqli_connect($server, $username, $password, $dbname);
$sql= "select * from teachers";
$res= mysqli_query($con,$sql);
$i= -1;
$j= -1;
while($r= mysqli_fetch_assoc($res))
{
    $i++;
    $j = -1;
    foreach($r as $x => $val)
    {
        $j++;
        $teachers[$i][$j] = $val;
    }
} 
$a = $i;
$b = $j;

//converting the array into string 
$js = "[ "; 
for ($i = 0; $i <= $a; $i++) 
{
    if($i != 0)
        {
            $js = $js.",";
        }
    $js = $js."[";
    for ($j = 0; $j < $b-1; $j++) 
    {
        if($j != 0)
        {
            $js = $js.",";
        }
        $js = $js."'";
        $var = $teachers[$i][$j];
        $js = $js."$var";
        $js = $js."'";
    }
    $js = $js."]";
}
$js = $js . "]";
// echo "$js"; Testing the string that I created just now

//string(converted array) sent to the client and data(details of each teacher) printed on screen  
echo "
<script>
let teachers = $js;
let html = '';
teachers.forEach
(function(element){
    html += `
    <div class='noteCard my-2 mx-2 card' style='width: 18rem;'>
        <div class='card-body'>
            <h5 class='card-title'>`+element[1]+`</h5>
            <p class='card-text'>`+element[2]+`</p>
            <p class='card-text'>`+element[3]+`</p>
            <form method='post'>
                <button name='delete' value='`+element[0]+`'>Delete</button> 
            </form>
        </div>
    </div>
    `;
});

let notes = document.getElementById('notes');
if(teachers.length != 0){
    notes.innerHTML= html;
}
else{
    notes.innerHTML= `<h3>There is no stored data</h3>`;
}

</script>
";

//Deleting the selected teacher
if($_POST)
{
    if(isset($_POST['goBack']))
    {
        header("location:/pisv/addVsDelete.php");
    }
    else
    {
        $sno = $_POST['delete'];
        //extracting data from mysql about the selected teacher
        $con = mysqli_connect("localhost","root","","pisv");
        $sql = "select * from teachers where sno=".$sno;
        $res = mysqli_query($con,$sql);
        $r = mysqli_fetch_assoc($res);
        //sending the exracted data to next page
        session_start();
        {
            $_SESSION["sno"]=$_POST['delete'];
            $_SESSION["name"]=$r['name'];
            $_SESSION["designation"]=$r['designation'];
            $_SESSION["phone"]=$r['phone'];
            header("location:/pisv/delConfirmTeacher.php");
        }
    }
}
?>
