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
if(($_REQUEST['course_ID'] == "") || ($_REQUEST['course_name'] == "") ||
($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") ||
($_REQUEST['course_duration'] == "") ||
($_REQUEST['course_orgprice'] == "") || ($_REQUEST['course_price'] == "") ) {
//msg displayed if required field missing
$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"
role="alert">Fill All Fileds </div>';
} else{
    //Assiging User Vakues to Variable
    $cid = $_REQUEST['course_ID'];
    $cname = $_REQUEST['course_name'];
    $cdesc = $_REQUEST['course_desc'];
    $cauthor = $_REQUEST['course_author'];
    $cduration = $_REQUEST['course_duration'];
    $corgprice = $_REQUEST['course_orgprice'];
    $cprice = $_REQUEST['course_price'];
    $cimg = '../image/Course/'.$_FILES['course_img']['name'];

    $sql = "UPDATE course SET course_ID = '$cid', course_name = '$cname',
    course_desc = '$cdesc', course_author = '$cauthor', course_img = '$cimg',
    course_duration = '$cduration', course_orgprice = '$corgprice',
    course_price = '$cprice'
    WHERE course_ID = '$cid'";
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
    <h3 class="text-center">update Course Details</h3>

    <?php
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM course WHERE course_ID = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course ID</label>
            <input type="text" class="form-control" id="course_ID"
            name="course_ID" value="<?php if(isset($row['course_ID']))
            {echo $row['course_ID']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name"
            name="course_name" value="<?php if(isset($row['course_name']))
            {echo $row['course_name']; }?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" id="course_desc" name="course_desc"
            row=2><?php if(isset($row['course_desc']))
            {echo $row['course_desc']; }?></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" 
            name="course_author" value="<?php if(isset($row['course_author']))
            {echo $row['course_author']; }?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration"
            name="course_duration" value="<?php if(isset($row['course_duration']))
            {echo $row['course_duration']; }?>">
        </div>
        <div class="form-group">
            <label for="course_orgprice">Course Original Price</label>
            <input type="text" class="form-control" id="course_orgprice"
            name="course_orgprice" value="<?php if(isset($row['course_orgprice']))
            {echo $row['course_orgprice']; }?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price"
            value="<?php if(isset($row['course_price']))
            {echo $row['course_price']; }?>">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <img src="<?php if(isset($row['course_img']))
            {echo $row['course_img']; } ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger"
            id="requpdate" name="requpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>
<?php
include('./admininclude/footer.php');
?>