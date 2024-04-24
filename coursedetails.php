<!-- start including header -->
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

<!-- Start main Contennt-->
<div class="container mt-5">
    <?php
    if(isset($_GET['course_ID'])){
        $course_ID = $_GET['course_ID'];
        $_SESSION['course_ID'] = $course_ID;
        $sql = "SELECT * FROM course WHERE course_ID = '$course_ID'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
            echo '
            <div class="row">
                <div class="col-md-4">
                    <img src=" '.str_replace('..', '.', $row['course_img']).' " class="card-img-top" alt="PHP" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-tittle">Course Name: '.$row['course_name'].'</h5>
                        <p class="card-text">Description: '.$row['course_desc'].'</p>
                        <p class="card-text">Duration: '.$row['course_duration'].'</p>
                        <form action="checkout.php" method="post">
                            <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_orgprice'].'</del></small> <span 
                            class="font-weight-bolder">&#8377 '.$row['course_price'].'<span></p>
                            <input type="hidden" name="id" value="'.$row['course_price'].'">
                            <button type="submit" class="btn btn-primary text-while 
                            font-weight-bolder float-right" name="buy">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
        }
        }
    }
    ?>
</div>
<div class="container">
          <div class="row">
          <?php $sql = "SELECT * FROM lesson";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
          echo '
           <table class="table table-bordered table-hover">
             <thead>
               <tr>
                 <th scope="col">Lesson No.</th>
                 <th scope="col">Lesson Name</th>
               </tr>
             </thead>
             <tbody>';
             $num = 0;
             while($row = $result->fetch_assoc()){
              if($row['course_ID'] == $course_ID) {
               $num++;
              echo ' <tr>
               <th scope="row">'.$num.'</th>
               <td>'. $row["lesson_name"].'</td></tr>';
              }
             }
             echo '</tbody>
           </table>';
            } ?>         
       </div>
      </div>
<!-- End main Contennt-->
<!-- Start including footer -->
<?php
include('./Mainfh/footer.php');
?>
<!-- End including footer -->