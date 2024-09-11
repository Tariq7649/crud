<?php

    include "includes/db.php";

    $selected_record = $_GET['id'];

    $query = mysqli_query($db_connect, "DELETE FROM `students` where s_id = '$selected_record' ");

    // Instant Redirection
    // header("location:students-list.php");

    // Redirection after some delay
    header("refresh: 3; url=students-list.php?status=OK");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Please Wait</title>
</head>
<body>

    <center>
        <img src="images/loader.gif" width="200px" >
    </center>
    
</body>
</html>