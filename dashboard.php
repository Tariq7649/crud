<?php
    session_start();
    include "includes/db.php";

    if(!isset($_SESSION['ADMIN_ID'])){
        header("location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to your Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">
                    Welcome to your Dashboard!
                </h3>
                <center>
                    <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
                    <a href="change_password.php" class="btn btn-sm btn-info">Change Password</a>
                </center>
                
            </div>
        </div>
    </div>

</body>
</html>