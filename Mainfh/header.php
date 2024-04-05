<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">


    <!--Student tetimonial owl Slider CSS-->
    <link rel="stylesheet" href="css/owl.min.css">
    <link rel="stylesheet" href="css/owl.theme.min.css">
    <link rel="stylesheet" href="css/testyslider.css">


    <!--GoogleFont -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0, -->
    <!-- 100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0, -->
    <!-- 900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> -->
    
    <!-- custom css-->
    <link rel="stylesheet" href="css/style.css">
    <title>SimpleLean for RuralMind</title>
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
        <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item custom-nav-item"><a href="course.php" class="nav-link">Courses</a></li>
        <li class="nav-item custom-nav-item"><a href="payment.php" class="nav-link">Payment</a></li>
        <?php
          session_start();
          if(isset($_SESSION['is_login'])){
            echo '<li class="nav-item custom-nav-item">
            <a href="Student/studentProfile.php" class="nav-link">My Profile</a></li>
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