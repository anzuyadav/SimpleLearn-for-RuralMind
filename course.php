<!-- Start including header -->
<?php
include('./database.php');
include('./Mainfh/header.php');
?>
<!-- End including header -->


<!-- Start course page Banner-->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/photo.jpg" alt="courses"
        style="height:500px; width: 100%; object-fit: cover;
        box-shadow:10px;"/>
    </div>
</div>
<!-- End course page Banner-->

<div class="col-sm-12 mt-5"> 
    <h1 class="text-center">All Courses</h1>
    <div class="row">

    <?php
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
            $course_ID = $row['course_ID'];
            echo '
                <div class="col-md-4 mt-4"> 
                    <a href="coursedetails.php?course_ID='.$course_ID.'" class="btn" style="text-align: left; padding:0px;">
                        <div class="card" max-height: 450px;>
                            <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="'.$row['course_name'].'" />
                            <div class="card-body">
                                <h5 class="card-title">'.$row['course_name'].'</h5>
                                <p class="card-text">'.$row['course_desc'].'</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_orgprice'].'</del></small> <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span></p>
                                <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_ID='.$course_ID.'">Enroll</a>
                            </div>
                        </div>
                    </a>  
                </div>
            ';
            }
        }
    ?>

    </div>
</div>

<!-- end of popular course -->

<!-- Start including footer -->
<?php
 include('./Mainfh/footer.php');
?>
<!-- End including footer -->