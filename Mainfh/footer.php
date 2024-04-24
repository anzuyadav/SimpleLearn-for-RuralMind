<!-- Start Footer -->
<footer class="container-fluid bg-dark text-center p-2">
  <small class="text-white">Copyright &copy; 2024 || Designed By
  E-learning  || <a href="#login" data-toggle="modal" data-target="#adminModal"> Admin login</a>
  </small>
</footer>
<!-- End footer-->

<!--Start Student Registeration-->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="regModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="regModalLabel">Student Registeration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Start registeration form -->             
        <?php
        include('./studentregistration.php');
        ?>
      </div>
      <!-- end registertaion form -->
      <div class="modal-footer">
        <span id="successMessage"></span>
        <button type="button" class="btn btn-primary"
        onclick="addStu()" id="signup">Sign Up</button>
        <button type="button" class="btn btn-secondary" 
        data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--End Student Registeration-->

<!-- Start Student Login Modal -->
<!-- Modal -->
<div class="modal fade" id="StudentModal" tabindex="-1" aria-labelledby="StudentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="StudentModalLabel">Student Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Start login form-->
        <form id="stuLoginForm">
          <div class="form-group">
            <i class="fas fa-envelope"></i><label for="stuLogemail"
            class="pl-2 font-weight-bold">Email</label>
            <input type="email"
            class="form-control" placeholder="Email"
            name="stuLogemail" id="stuLogemail">
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="stuLogpass"
            class="pl-2 font-weight-bold">Password</label>
            <input type="password"
            class="form-control" placeholder="Password"
            name="stuLogpass" id="stuLogpass">
          </div>
        </form>
        <!--End login form-->
      </div>
      <div class="modal-footer">
        <small id ="statusLogMsg"></small>
        <button type="button" class="btn btn-primary" 
        onclick="checkStuLog()"> Login </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>
<!-- End Student Login Modal -->

<!-- Start Admin Login Modal -->

<!-- Modal -->
<div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminModalLabel">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Start login form-->
        <form id="adminLoginForm">
          <div class="form-group">
            <i class="fas fa-envelope"></i><label for="adminLogemail"
            class="pl-2 font-weight-bold">Email</label>
            <input type="email"
            class="form-control" placeholder="Email"
            name="adminLogemail" id="adminLogemail">
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="adminLogpass"
            class="pl-2 font-weight-bold">Password</label>
            <input type="password"
            class="form-control" placeholder="Password"
            name="adminLogpass" id="adminLogpass">
          </div>
        </form>
          <!--End login form-->
      </div>
      <div class="modal-footer">
      <small id ="statusAdminLogMsg"></small>
      <button type="button" class="btn btn-primary" onclick="checkAdminLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>

<!-- End Admin Login Modal -->


<script src="js/jquery.min.js"></script>
<script src="js/poper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Font awesome JS-->
<script src="js/all.min.js"></script>

<!--Student Testimonial Owl Slider JS-->
<script type="text/javascript" src="js/owl.min.js"></script>
<script type="text/javascript" src="js/testyslider.js"></script>

<!--Student Ajax call JS-->
<script type="text/javascript" src="js/ajaxrequest.js"></script>
<!--admin-->
<script type="text/javascript" src="js/adminajaxrequest.js"></script>
</body>
</html>