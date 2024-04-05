<?php
include('./admininclude/header.php');
include('../database.php');

if(isset($_REQUEST['newStuSubmitbtn'])){
    //checking for empty field
    if(($_REQUEST['student_name'] == "") || ($_REQUEST['student_email'] == "") ||
    ($_REQUEST['student_pass'] == "") || ($_REQUEST['student_occ'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill 
        All Fields</div>';
    } else {
        $student_name = $_REQUEST['student_name'];
        $student_email = $_REQUEST['student_email'];
        $student_pass = $_REQUEST['student_pass'];
        $student_occ = $_REQUEST['student_occ'];
        

        $sql ="INSERT INTO student(student_name, student_email,
        student_pass, student_occ) VALUES ( '$student_name', 
        '$student_email', '$student_pass', '$student_occ')";
        
        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 
            ml-5 mt-2">students Added Successfully :)</div>';
        }
        else{
            $msg = '<div class="alert alert-danger col-sm-6 
            ml-5 mt-2">Unable to added students</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="student_name">Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name">
        </div>
        <div class="form-group">
            <label for="student_email">Email</label>
            <textarea class="form-control" id="student_email" name="student_email"
            row=2></textarea>
        </div>
        <div class="form-group">
            <label for="student_pass">Password</label>
            <input type="text" class="form-control" id="student_pass" name="student_pass">
        </div>
        <div class="form-group">
            <label for="student_occ">Occupation</label>
            <input type="text" class="form-control" id="student_occ" name="student_occ">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger"
            id="newStuSubmitbtn" name="newStuSubmitbtn">Submit</button>
            <a href="Students.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>


<?php
include('./admininclude/footer.php');
?>

