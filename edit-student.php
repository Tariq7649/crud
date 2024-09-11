<?php

    include "includes/db.php";

    $selected_record = $_GET['id'];

    $query_select = mysqli_query($db_connect, "SELECT * from `students` WHERE s_id = '$selected_record' ");
    $data_select = mysqli_fetch_array($query_select);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h1 class="text-center">
                    Edit Student
                </h1>

<?php

    if(isset($_POST['submit'])){

        $student_name = $_POST['student_name'];
        $student_class = $_POST['student_class'];
        $student_rollno = $_POST['student_rollno'];
        $student_father = $_POST['student_father'];

        $query_update = mysqli_query($db_connect, "UPDATE `students` SET
        
            s_name = '$student_name',
            s_rollno = '$student_rollno',
            s_class = '$student_class',
            s_fathername = '$student_father'

            WHERE s_id = '$selected_record'
        
        ");

        header("location: students-list.php?changes=OK");
    }

?>

                <form action="" method="POST">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="<?php echo $data_select['s_name']; ?>" class="form-control" name="student_name" required>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" value="<?php echo $data_select['s_class']; ?>" class="form-control" name="student_class" required>
                    </div>
                    <div class="form-group">
                        <label>Roll No.</label>
                        <input type="text" value="<?php echo $data_select['s_rollno']; ?>" class="form-control" name="student_rollno" required>
                    </div>
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" value="<?php echo $data_select['s_fathername']; ?>" class="form-control" name="student_father" required>
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-primary w-100" type="submit" name="submit">Save changes</button>
                    </div>

                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>


</body>
</html>