<?php

    include "includes/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset your Password!</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2 class="text-center">
                    Recover your password!
                </h2>
                <hr/>

<?php

    if(isset(($_POST['submit']))){
        $email_address = $_POST['email_address'];

        $query_select = mysqli_query($db_connect, "SELECT admin_email from `admin` where admin_email = '$email_address' ");

        $checkpoint = mysqli_num_rows($query_select);

        if($checkpoint > 0){

            $generate_random_pass = rand(100000,999999);
            $password_encrypted = sha1($generate_random_pass);

            $query_update = mysqli_query($db_connect, "UPDATE `admin` SET
            
                admin_pass = '$password_encrypted'

                WHERE admin_email = '$email_address'

            ");

            // Email Generating Process Starts

                $from = 'no-reply@ahtashamkhan.com';
                $to = $email_address;
                $subject = 'Your New Password!';
                $message = 'Hello, \n';
                $message .= 'Your new password is: \n';
                $message .= $generate_random_pass . '\n';
                $message .= 'Please go to https://ahtashamkhan.com/login.php to login to your account';

                // Sending Email Now
                mail($to, $subject, $message);


            // Email Generating Process Ends


        }
    }

?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Enter your Email Address</label>
                        <input type="email" class="form-control" name="email_address" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>


</body>
</html>