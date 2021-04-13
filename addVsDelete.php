<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Teacher/Notice</title>
    <link rel="stylesheet" href="css/addVsDelete.css">
</head>
<body>
    <h3>Choose the option you want to perform</h3>
    <form method="post">
        <button name="principalsChoice" value="addTeacher" class="btn">Add Teacher</button>
        <button name="principalsChoice" value="addNotice" class="btn">Add Notice</button>
        <button name="principalsChoice" value="deleteTeacher" class="btn">Delete Teacher</button>
        <button name="principalsChoice" value="deleteNotice" class="btn">Delete Notice</button>
        <button name="principalsChoice" value="goBack" class="btn">Go Back</button>
    </form>
</body>
</html>

<?php
if($_POST)
{
    $principalsChoice= $_POST['principalsChoice'];
    if($principalsChoice == 'addTeacher')
    {
        header("location:/pisv/addTeacher.php");
    }
    else if($principalsChoice == 'addNotice')
    {
        header("location:/pisv/addNotice.php");
    }
    else if($principalsChoice == 'deleteTeacher')
    {
        header("location:/pisv/deleteTeacher.php");
    }
    else if($principalsChoice == 'deleteNotice')
    {
        header("location:/pisv/deleteNotice.php");
    }
    else
    {
        header("location:/pisv/admissions.php");
    }
}
?>