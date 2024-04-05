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
if(isset($_REQUEST['requpdate'])){
//checking empty fields
if(($_REQUEST['lesson_ID'] == "") || ($_REQUEST['lesson_name'] == "") ||
($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_ID'] == "") ||
($_REQUEST['course_name'] == "")) {
//msg displayed if required field missing
$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"
role="alert">Fill All Fileds </div>';
} else{
    //Assiging User Vakues to Variable
    $lid = $_REQUEST['lesson_ID'];
    $lname = $_REQUEST['lesson_name'];
    $ldesc = $_REQUEST['lesson_desc'];
    $cid = $_REQUEST['course_ID'];
    $cname = $_REQUEST['course_name'];
    $llink = '../lessonvedio'.$_FILES['lesson_link']['name'];

    $sql = "UPDATE lesson SET lesson_ID = '$lid', lesson_name = '$lname',
    lesson_desc = '$ldesc', course_ID = '$cid', course_name = '$cname',
    lesson_link = '$llink'
    WHERE lesson_ID = '$lid'";
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
    <h3 class="text-center">update Lesson Details</h3>

    <?php
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM lesson WHERE lesson_ID = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_ID">Lesson ID</label>
            <input type="text" class="form-control" id="lesson_ID"
            name="lesson_ID" value="<?php if(isset($row['lesson_ID']))
            {echo $row['lesson_ID']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name"
            name="lesson_name" value="<?php if(isset($row['lesson_name']))
            {echo $row['lesson_name']; }?>">
        </div>course_name
        <div class="form-group">
            <label for="course_desc">Lesson Description</label>
            <textarea class="form-control" id="lesson_desc" name="lesson_desc"
            row=2><?php if(isset($row['lesson_desc']))
            {echo $row['lesson_desc']; }?></textarea>
        </div>
        <div class="form-group">
            <label for="course_ID">Course ID</label>
            <input type="text" class="form-control" id="course_ID" 
            name="course_ID" value="<?php if(isset($row['course_ID']))
            {echo $row['course_ID']; }?>">
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name"
            name="course_name" value="<?php if(isset($row['course_name']))
            {echo $row['course_name']; }?>">
        
        <div class="form-group">
            <label for="lesson_link">Lesson link</label>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php if(isset($row['lesson_link'])) {echo $row['lesson_link'];}?>"
                allowfullscreen></iframe>
            </div>
            <input type="file" class="form-control-file"
            id="lesson_link" name="lesson_link">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger"
            id="requpdate" name="requpdate">Update</button>
            <a href="lesson.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>
<?php
include('./admininclude/footer.php');
?>