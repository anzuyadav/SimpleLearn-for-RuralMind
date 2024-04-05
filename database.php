<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "project_database";
    

    // Create Connection
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    //check connection
    if($conn->connect_error){
        die("connection failed");
    }
    // else{
    // echo"connected";
    // }
?>
