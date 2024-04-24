<?php 
include_once('../database.php');
  if(!isset($_SESSION)){ 
    session_start(); 
  } 
  if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
  } 
 // else {
 //  echo "<script> location.href='../index.php'; </script>";
 // }
  if(isset($stuLogEmail)){
    $sql = "SELECT student_image FROM student WHERE student_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['student_image'];
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
  <?php echo TITLE ?>
  </title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">

    <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/stustyle.css">

</head>

<body>

    <!-- Start Navigation -->
<nav class="navbar navbar-expand-sm  navbar-dark bg-dark pl-5 fixed-top">s
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">SimpleLearn for RuralMind</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav custom-nav pl-10">
        <li class="nav-item custom-nav-item"><a href="../index.php" class="nav-link">Home</a></li>
        <li class="nav-item custom-nav-item"><a href="../course.php" class="nav-link">Courses</a></li>
        <li class="nav-item custom-nav-item"><a href="../payment.php" class="nav-link">Payment</a></li>
        <?php
          
          if(isset($_SESSION['is_login'])){
            echo '<li class="nav-item custom-nav-item">
            <a href="studentProfile.php" class="nav-link">My Profile</a></li>
            <li class="nav-item custom-nav-item">
            <a href="logout.php" class="nav-link">Logout</a></li>';
          }
          else{
            echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" 
            data-toggle="modal" data-target="#StudentModal">Login</a>
            </li> 
            <li class="nav-item custom-nav-item"><a href="#" class="nav-link" 
            data-toggle="modal" data-target="#regModal">SignUp</a>
            </li>';
          }
        ?>
        <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
        <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>
        
      </ul>
    </div>
  </div>
</nav>
<!--End of navigation bar-->

  <!-- Side Bar -->
  <div class="container-fluid mb-5 " style="margin-top:40px;">
    <div class="row">
    <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
      <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item mb-3">
        <img src="<?php echo $stu_img ?>" alt="studentimage" class="img-thumbnail rounded-circle">
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if(PAGE == 'profile') {echo 'active';} ?>" href="studentProfile.php">
          <i class="fas fa-user"></i>
          Profile <span class="sr-only">(current)</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if(PAGE == 'mycourse') {echo 'active';} ?>" href="myCourse.php">
          <i class="fab fa-accessible-icon"></i>
          My Courses
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if(PAGE == 'feedback') {echo 'active';} ?>" href="studentFeedback.php">
          <i class="fab fa-accessible-icon"></i>
          Feedback
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if(PAGE == 'studentChangePass') {echo 'active';} ?>" href="studentChangePassword.php">
          <i class="fas fa-key"></i>
          Change Password
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fas fa-sign-out-alt"></i>
          Logout
        </a>
        </li>
      </ul>
      </div>
    </nav>