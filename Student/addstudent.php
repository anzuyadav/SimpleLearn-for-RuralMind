<?php
if(!isset($_SESSION)){
    session_start();
}

include_once('../database.php');


//checking already registered email
if(isset($_POST['checkmail']) && isset($_POST['stuemail'])){
    $stuemail = $_POST['stuemail'];
    $sql ="SELECT student_email FROM student WHERE student_email = '".$stuemail."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}




// insert student
if(isset($_POST['stusignup']) && ($_POST['stuname']) && ($_POST['stuemail']) 
&& ($_POST['stupass'])){
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];

    $sql = "INSERT INTO student(student_name, student_email, student_pass) VALUES
    ('$stuname', '$stuemail', '$stupass')";

    if($conn->query($sql) == TRUE){
        echo json_encode("OK");
    }
    else{
        echo json_encode("FAILED");
    }
}

//student login verification
if(!isset($_SESSION['is_login'])){
    if(isset($_POST['checkLogEmail']) && isset($_POST['stuLogEmail']) && isset($_POST['stuLogPass'])){
        $stuLogEmail = $_POST['stuLogEmail'];
        $stuLogPass = $_POST['stuLogPass'];

        $sql = "SELECT student_email, student_pass FROM student WHERE student_email='".$stuLogEmail."' AND student_pass='".$stuLogPass."'";

        $result = $conn->query($sql);
        $row = $result->num_rows;
        if($row === 1){
            $_SESSION['is_login'] = true;
            $_SESSION['stuLogEmail'] = $stuLogEmail;
            echo json_encode($row);
        }
        else if($row === 0){
            echo json_encode($row); 
        }
    }
}
?>
