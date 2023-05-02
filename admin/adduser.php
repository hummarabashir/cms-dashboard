<?php 
  
include("session.php");
if($login_role=='author'){
 header('location:author.php');
}


include('inc/head.php');
?>

<?php
include('inc/header1.php');

 ?>

  <div class="content-wrapper">
    
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add User</li>
      </ol>



<div class="container">
    <div class="card  mx-auto  mb-3">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form action="register1.php" method="post" enctype="multipart/form-data" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Name</label>
                <input class="form-control" id="exampleInputName" name="username" type="text" aria-describedby="nameHelp" placeholder="Enter name">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Phone</label>
                <input class="form-control" id="exampleInputLastName" name="phone" type="text" aria-describedby="nameHelp" placeholder="Enter phone no">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="role">Role</label>
                <!-- <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password"> -->
                <br>
               <select id="role" name="role" maxlength="50" onchange='checkvalue(this.value)' required>
            <option hidden disabled selected>Select User Role</option>
            <optgroup label="User Privilege">
                <option value="admin">Admin</option>
                <option value="author">Author</option>
            </optgroup>
          </select> 
              </div>
            </div>
          </div>
           <div class="form-group">
            <label for="exampleInputImage">Profile Image</label>
            <input class="form-control" id="exampleInputImage" type="file" name="image" id="fileToUpload" required> 
          </div>
         <input class="btn btn-primary btn-block" type="submit" name="submit" value="Register"/>
          <span>
            <?php
              if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                session_destroy();
              }
          ?>
        </span>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
          <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
        </div>
      </div>
    </div>
  </div>









</div>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Home 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
