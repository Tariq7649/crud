<?php

    session_start();
    include "includes/db.php";

    if(isset(($_POST['login_btn']))){
        $email_address = $_POST['email_address'];
        $password = sha1($_POST['password']);
        $password_unencrypted = $_POST['password'];
        $remember = $_POST['remember'];

        if(isset(($remember)) && $remember == 'YES'){

            setcookie('email_cookie', $email_address, time() + (30));
            setcookie('password_cookie', $password_unencrypted, time() + (30));
        }

        $query = mysqli_query($db_connect, "SELECT * from `admin` WHERE admin_email = '$email_address' and admin_pass = '$password' ");
        $checkpoint = mysqli_num_rows($query);

        if($checkpoint == 1){

            $data = mysqli_fetch_array($query);

            $_SESSION['ADMIN_ID'] = $data['admin_id'];

            header("location: dashboard.php");
        }else{
            $error_msg = "<div class='alert alert-danger'><b>Oh Uh! Your email or password is invalid.</b></div>";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account!</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h3 class="text-center">Login to your account!</h3>
                <hr/>
                <?php if(isset($error_msg)){ echo $error_msg; } ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input value="<?php if(isset($_COOKIE['email_cookie'])){ echo $_COOKIE['email_cookie']; } ?>" type="email" class="form-control" name="email_address" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input value="<?php if(isset($_COOKIE['password_cookie'])){ echo $_COOKIE['password_cookie']; } ?>" type="password" class="form-control" name="password" required>
                    </div>
                    <a href="forget_password.php">Forget Password</a>
                    <div class="form-group">
                        <input type="checkbox" name="remember" value="YES"> Remember Me!
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login_btn" class="btn btn-primary w-100">Login</button>
                    </div>
                    <div class="form-group mt-2">
                        <a href="signup.php" class="btn btn-success w-100">Don't have an account? Signup</a>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</body>
</html>