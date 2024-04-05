<?php
if(!isset($_SESSION)){
    session_start();
}

include('./admininclude/header.php');
include('../database.php');

if(isset($_SESSION['is_adminlogin'])){
$adminEmail = $_SESSION['adminLogEmail'];
}else{
    echo "<script> location.href='../index.php'; </script>";
}


// Upadte course 
if(isset($_REQUEST['updateStuBtn'])){
//checking empty fields
if(($_REQUEST['student_ID'] == "") || ($_REQUEST['student_name'] == "") || ($_REQUEST['student_email'] == "") ||
($_REQUEST['student_pass'] == "") || ($_REQUEST['student_occ'] == "")){
//msg displayed if required field missing
$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"
role="alert">Fill All Fileds </div>';
} else{
    //Assiging User Vakues to Variable
    $sid = $_REQUEST['student_ID'];
    $sname = $_REQUEST['student_name'];
    $semail = $_REQUEST['student_email'];
    $spass = $_REQUEST['student_pass'];
    $socc = $_REQUEST['student_occ'];
    

    $sql = "UPDATE student SET student_ID = '$sid', student_name = '$sname',
    student_email = '$semail', student_pass = '$spass', student_occ = '$socc '
    WHERE student_ID = '$sid'";
        if($conn->query($sql) == TRUE){
            //below msg display on form submit success
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"
            role="alert">Updated Successfully</div>';
        } else{
            //belwo msg dispaky in for submit failed
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"
            role="alert"> Unable to update </div>';
        }
}
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student Details</h3>

    <?php
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM student WHERE student_ID = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="student_ID">ID</label>
            <input type="text" class="form-control" id="student_ID" 
            name="student_ID" value="<?php if(isset($row['student_ID']))
            {echo $row['student_ID']; }?>" readonly>

        <div class="form-group">
            <label for="student_name">Name</label>
            <input type="text" class="form-control" id="student_name" 
            name="student_name" value="<?php if(isset($row['student_name']))
            {echo $row['student_name']; }?>">
        </div>
        <div class="form-group">
            <label for="student_email">Email</label>
            <textarea class="form-control" id="student_email" name="student_email"
            row=2><?php if(isset($row['student_email']))
            {echo $row['student_email']; }?></textarea>
        </div>
        <div class="form-group">
            <label for="student_pass">Password</label>
            <input type="text" class="form-control" id="student_pass"
            name="student_pass" value="<?php if(isset($row['student_pass']))
            {echo $row['student_pass']; }?>">
        </div>
        <div class="form-group">
            <label for="student_occ">Occupation</label>
            <input type="text" class="form-control" id="student_occ" 
            name="student_occ" value="<?php if(isset($row['student_occ']))
            {echo $row['student_occ']; }?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger"
            id="updateStuBtn" name="updateStuBtn">update</button>
            <a href="Students.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>
<?php
include('./admininclude/footer.php');
?>