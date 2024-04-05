<!--Start css and navigation -->
<?php
include('./Mainfh/header.php');
include('./database.php');
?>
<!--End css and navigation -->

 <!-- Star vedio background -->
 
<div class="container-fluid remove-video-marg">
    <div class="video-parent">
        <video playsinline autoplay muted loop class="length">
            <source src="vedio/vedio1.mp4">
        </video>
        <div class="vid-overlay"></div>
    </div>
      <div class="video-content d-flex flex-column align-items-center abc">
        <h1 class="my-content">Welcome to SimpleLearn for RuralMind</h1>
        <br>

        <?php
        if(!isset($_SESSION['is_login'])){
          echo '<a href="#" class="btn btn-danger  mt-3" 
          data-toggle="modal" data-target="#regModal">Lets Start</a>';
        }
        else {
          echo '<a href="Student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a>';
        }

        
        ?>
        
      </div>
    
</div>

<!-- End vedio background -->

 <!-- Start text Banner -->
    <div class="container-fluid bg-danger txt-banner"> 
        <div class="row bottom-banner">
          <div class="col-sm">
            <h5> <i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fas fa-rupee-sign mr-3"></i> Money Back Guarantee*</h5>
          </div>
        </div>
    </div>
<!-- End text Banner -->

    
<!-- Start Most Popular Course -->
<div class="container mt-5"> 
  <h1 class="text-center">Popular Course</h1>
    <!-- Start Most Popular Course 1st Card Deck -->
    <div class="card-deck mt-4"> 
      <?php
        $sql = "SELECT * FROM course LIMIT 3";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            $course_ID = $row['course_ID'];
            echo '
            <a href="coursedetails.php?course_id='.$course_ID.'"  class="btn" style="text-align: left; padding:0px;">
            <div class="card">
            <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="PHP" />
            <div class="card-body">
                <h5 class="card-title">'.$row['course_name'].'</h5>
                <p class="card-text">'.$row['course_desc'].'</p>
            </div>
            <div class="card-footer">
                <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_orgprice'].'</del>
                </small> <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span></p>
                <a class="btn btn-primary text-white font-weight-bolder float-right"
                href="coursedetails.php?course_ID='.$course_ID.'">Enroll</a>
            </div>
      </div>
      </a>';
      }
    }
    ?>      
  </div> 
  <!-- End Most Popular Course 1st Card Deck -->   

    <!-- Start Most Popular Course 2st Card Deck -->
    <div class="card-deck mt-4"> 
        <!-- First Instance of the Course -->
        <?php
        $sql = "SELECT * FROM course LIMIT 3,3";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            $course_ID = $row['course_ID'];
            echo '
            <a href="coursedetails.php?course_id='.$course_ID.'"  class="btn" style="text-align: left; padding:0px;">
            <div class="card">
            <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="PHP" />
            <div class="card-body">
                <h5 class="card-title">'.$row['course_name'].'</h5>
                <p class="card-text">'.$row['course_desc'].'</p>
            </div>
            <div class="card-footer">
                <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_orgprice'].'</del>
                </small> <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span></p>
                <a class="btn btn-primary text-white font-weight-bolder float-right"
                href="coursedetails.php?course_ID='.$course_ID.'">Enroll</a>
            </div>
      </div>
      </a>';
      }
    }
    ?> 
    <!-- End Most Popular Course 2st Card Deck -->    
</div>  
    <div class="text-center m-2">
      <a class="btn btn-danger btn-sm" href="course.php">View All Course</a> 
    </div>
  </div>
<!-- end of popular course -->


<!--Start contact Us -->
<?php
include('./contact.php');
?>
<!--End contact Us -->


<!--Start Student Testimonial-->
    <div class="container-fluid mt-5" style="background-color: #4B7289" id ="Feedback">
      <h1 class="text-center testyheading p-4">Student's Feedback</h1>
      <div class="row">
        <div class="col-md-12">
          <div id="testimonial-slider" class="owl-carousel">
          <?php 
              $sql = "SELECT s.student_name, s.student_occ, s.student_image, f.feedback_content FROM 
              student AS s JOIN feedback AS f ON s.student_ID = f.student_ID";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                  $s_img = $row['student_image'];
                  $n_img = str_replace('../','',$s_img);
                
            ?>
            <div class="testimonial">
              <p class="description">
                <?php echo $row['feedback_content']; ?>
              </p>
              <div class="pic">
                <img src="<?php echo $n_img ?>" alt=""/>
              </div>
              <div class="testimonial-proof">
                <h4><?php echo $row['student_name']; ?></h4>
                <small><?php echo $row['student_occ']; ?> </small>
              </div>
            </div>
            <?php }
                }?>
          </div>
        </div>
      </div>
    </div>
  <!-- End Student testimonail -->

  <!-- Start Social Follow -->
    <div Class="conatiner-fluid bg-danger">
      <div class="row text-white text-center p-1">
        <div class="col-sm">
          <a class="text-white social-hover" href="#"><i class="fab fa-facebook-f">
          </i> Facebook</a>
        </div>
        <div class="col-sm">
          <a class="text-white social-hover" href="#"><i class="fab fa-twitter">
          </i> Twitter</a>
        </div>
        <div class="col-sm">
          <a class="text-white social-hover" href="#"><i class="fab fa-whatsapp">
          </i> WhatsApp</a>
        </div>
        <div class="col-sm">
          <a class="text-white social-hover" href="#"><i class="fab fa-instagram">
          </i> Instagram</a>
        </div>
      </div>
    </div>
 <!-- End Socail Follow -->
    <div class="container-fluid p-4" style="background-color:#E9ECEF">
    <div class="container" style="background-color:#E9ECEF">
      <div class="row text-center">
        <div class="col-sm">
          <h5>About Us</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt lobortis feugiat vivamus at augue eget. Leo integer malesuada nunc vel risus. Purus in massa 
            tempor nec feugiat nisl pretium. Viverra orci sagittis eu volutpat.</p>
        </div>
        <div class="col-sm">
          <h5>Category</h5>
          <a class="text-dark" href="#"> Web Development</a><br/>
          <a class="text-dark" href="#"> Web Designing</a><br/>
          <a class="text-dark" href="#"> Android App Development</a><br/>
          <a class="text-dark" href="#"> iOS Development</a><br/>
          <a class="text-dark" href="#"> Data Analysis</a><br/>
        </div>
        <div class="col-sm">
          <h5>Conatct Us</h5>
          <p>SimpleLearn For RuralMind <br> Tinkune, Kathmandu <br> Ph. +977 9856231478</p>
        </div>
      </div>
    </div>
    </div>
<!-- End of About Section -->

<!--Including Footer -->
<?php
include('./Mainfh/footer.php');
?>
<!--End footer -->