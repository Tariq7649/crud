<?php

    include "includes/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

                <h2 class="text-center">
                    Add Student
                </h2>
                <hr/>

<?php

    if(isset($_POST['submit'])){

        $student_name = $_POST['student_name'];
        $student_class = $_POST['student_class'];
        $student_rollno = $_POST['student_rollno'];
        $student_father = $_POST['student_father'];

        $query = mysqli_query($db_connect, "INSERT into `students` SET 
        
            s_name = '$student_name',
            s_rollno = '$student_rollno',
            s_class = '$student_class',
            s_fathername = '$student_father'
        
          ");

          $success_msg = "<div class='alert alert-success'>Awesome! Student has been added successfully!</div>";

    }


?>
<?php

    if(isset($success_msg)){
        echo $success_msg;
    }

?>

                <form action="" method="POST">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="student_name" required>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" class="form-control" name="student_class" required>
                    </div>
                    <div class="form-group">
                        <label>Roll No.</label>
                        <input type="text" class="form-control" name="student_rollno" required>
                    </div>
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" class="form-control" name="student_father" required>
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-primary w-100" type="submit" name="submit">Add Student</button>
                    </div>

                    
                </form>

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    
</body>
</html>