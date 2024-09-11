<?php

    include "includes/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Students List</h1>
                <hr/> 
                <?php if(isset($_GET['status']) && $_GET['status'] == 'OK'){

                    echo "<div class='alert alert-success'>Awesome! Record has been removed.</div>";
                }

                ?>

                <?php if(isset($_GET['changes']) && $_GET['changes'] == 'OK'){

                echo "<div class='alert alert-success'>Awesome! Your changes has been saved.</div>";
                }

                ?>
                
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Roll No.</th>
                        <th>Class</th>
                        <th>Father Name</th>
                        <th>Actions</th>
                    </tr>

<?php

    $query_students = mysqli_query($db_connect, "SELECT * from `students` ");
    $serial_no = 0;
    while($data_students = mysqli_fetch_array($query_students)){
    $serial_no++;

   ?>
                    <tr> 
                        <td><?php echo $serial_no; ?></td>
                        <td>
                            <?php echo $data_students['s_name']; ?>
                        </td>
                        <td>
                            <?php echo $data_students['s_rollno']; ?>
                        </td>
                        <td>
                            <?php echo $data_students['s_class']; ?>
                        </td>
                        <td>
                            <?php echo $data_students['s_fathername']; ?>
                        </td>
                        <td>
                            <a href="edit-student.php?id=<?php echo $data_students['s_id']; ?>">Edit</a>

                            <a  onclick="return confirm('Are you sure you want to delete this student?');" href="delete-student.php?id=<?php echo $data_students['s_id']; ?>">Delete</a>
                        </td>
                    </tr>
<?php } ?>                    
                </table>

            </div>
        </div>
    </div>
    
</body>
</html>