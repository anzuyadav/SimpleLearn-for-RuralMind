 <!-- Start including header -->
 <?php
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

<!-- Satrt Main Content for payment -->
<div class="conatiner">
    <h2 class="text-center my-4">Payment Status</h2>
    <form method="post" action="">
    <div class="form-group row">
        <label class="offset-sm-3 col-form-label">Order ID: </label>
        <div>
            <input type="text" class="form-control mx-3">
        </div>
        <div>
            <input type="submit" class="btn btn-primary mx-4"
            value="View">
        </div>
    </div>
    </form>
</div>
<!-- End Main Content for payment -->

    <!-- Start Contact Us-->
 <?php
 include('./contact.php');
 ?>
 <!-- End Contact Us-->


<!-- Start including footer -->
<?php
 include('./Mainfh/footer.php');
?>
<!-- End including footer -->