
<?php
if(!isset($_SESSION)){
    session_start();
}

include_once('../database.php');

//Admin login verification
if(!isset($_SESSION['is_adminlogin'])){
    if(isset($_POST['checkLogEmail']) && isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])){
        $adminLogEmail = $_POST['adminLogEmail'];
        $adminLogPass = $_POST['adminLogPass'];

        $sql = "SELECT admin_email, admin_pass FROM admin WHERE admin_email='".$adminLogEmail."' AND admin_pass='".$adminLogPass."'";

        $result = $conn->query($sql);
        $row = $result->num_rows;
        if($row === 1){
            $_SESSION['is_adminlogin'] = true;
            $_SESSION['adminLogEmail'] = $adminLogEmail;
            echo json_encode($row);
        }
        else if($row === 0){
            echo json_encode($row); 
        }
    }
}
?>