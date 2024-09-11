<?php
    session_start();
    include "includes/db.php";

    if(!isset($_SESSION['ADMIN_ID'])){
        header("location: login.php");
    }


    if(isset(($_POST['change_password']))){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        

    $query_for_old_pass = mysqli_query($db_connect, "SELECT * FROM 'admin'WHERE admin_pass ='$old_password'AND admin_id = $_SESSION['ADMIN_ID'] ");
     $checkpoint_old_pass = mysqli_num_rows($query_for_old_pass);
     if($checkpoint_old_pass == 1){

            if ($new_password==$confirm_password) {

                $query_new_pass_update= mysqli_query($db_connect," UPDATE 'admin' set admin_pass='$new_password' and admin_id = $_SESSION['ADMIN_ID'] ");
                
            }else{

                $error_password_matching= "<div class='alert alert-danger'><b>Your New and Confirm Password Does not match</b></div>";
            }

           
        } else {
            $error_old_pass = "<div class='alert alert-danger'><b>Oh Uh! Your old password is invalid.</b></div>";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Your Password..!</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h4 class="text-center">Change Your Password..!</h4>
                <hr/>
                <?php if(isset($error_old_pass)){ echo $error_old_pass; } ?>

                <?php if(isset($error_password_matching)){ echo $error_password_matching; } ?>


                <form action="" method="POST">
                   
                    <div class="form-group">
                        <label>Old Password</label>
                        <input  type="password" class="form-control" name="old_password" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input  type="password" class="form-control" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input  type="password" class="form-control" name="confirm_password" required>
                    </div>

                    
                    <div class="form-group">
                        <button type="submit" name="change_password" class="btn btn-primary w-100">Change Password</button>
                    </div>
                    
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</body>
</html>