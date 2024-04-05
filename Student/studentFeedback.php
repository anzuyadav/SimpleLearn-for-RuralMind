<?php
if(!isset($_SESSION)){ 
session_start(); 
}
define('TITLE', 'Feedback');
define('PAGE', 'feedback');
include('./stuInclude/header.php'); 
include_once('../database.php');

if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

$sql = "SELECT * FROM student WHERE student_email='$stuEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row = $result->fetch_assoc();
$stuId = $row["student_ID"];
}

if(isset($_REQUEST['submitFeedback'])){
    if(($_REQUEST['feedbackcontent'] == "")){
     // msg displayed if required field missing
    $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else{
        $fcontent = $_REQUEST["feedbackcontent"];
        $sql = "INSERT INTO feedback (feedback_content, student_ID) VALUES
        ('$fcontent', '$stuId')";
        if($conn->query($sql) == TRUE){
            // below msg display on form submit success
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
            } else {
            // below msg display on form submit failed
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
            }
    }
}
?>
<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student ID</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value=" <?php if(isset($stuId)) {echo $stuId;} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail">Write Feedback</label>
            <textarea class="form-control" id="feedbackcontent"
            name="feedbackcontent" row=2></textarea>
        </div>
        <button type="submit" class="btn btn-primary" 
        name="submitFeedback">Submit</button>
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
    </form>
</div>
<?php
include('./stuInclude/footer.php'); 
?>