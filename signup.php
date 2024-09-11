<?php

    include "includes/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account!</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2 class="text-center">Create an account</h2>
                <hr/>

<?php

    if(isset(($_POST['submit']))){

        $full_name = $_POST['full_name'];
        $email_address = $_POST['email_address'];
        $password = sha1($_POST['password']);
        $confirm_password = sha1($_POST['confirm_password']);
        $current_date = date("Y-m-d");

        $query_select = mysqli_query($db_connect, "SELECT * from `admin` where admin_email = '$email_address' ");
        $checkpoint = mysqli_num_rows($query_select);

        if($checkpoint == 0){

            if($password == $confirm_password){

                $query_insert = mysqli_query($db_connect, "INSERT INTO `admin` SET
                
                    admin_name = '$full_name',
                    admin_email = '$email_address',
                    admin_pass = '$password',
                    joined_date = '$current_date'
                
                ");

                $success_msg = "<div class='alert alert-success'><b>Awesome!</b> Your account has been created!</div>";

            }else{
                $error_2 = "<div class='alert alert-danger'><b>Oh Snap!</b> Your both passwords does not match.</div>";
            }

        }else{
            $error_1 = "<div class='alert alert-danger'><b>Oh Snap!</b> This email address is already exists.</div>";
        }

    }

?>


                <?php

                    if(isset($error_1)){
                        echo $error_1;
                    }
                    if(isset($error_2)){
                        echo $error_2;
                    }
                    if(isset($success_msg)){
                        echo $success_msg;
                    }
                ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email_address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" maxlength="8" minlength="6" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Sign Up!</button>
                    </div>
                    <div class="form-group">
                        <a href="login.php" class="btn btn-success w-100 mt-2">Already have an account? Login</a>
                    </div>
                </form>

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</body>
</html>