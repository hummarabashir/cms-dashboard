<?php 
include("session.php");
include_once("connect.php");

  if(isset($_POST['update']))
  {
 $username = $_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];    
$sql= "UPDATE login SET username='$username',password='$password',email='$email',phone='$phone' WHERE username='$username'";
$result=mysql_query($sql);
  if($result)
  {
  echo "Successfully Updated!!";
  header('Location:viewprofile.php');
  }
}



include('inc/head.php');
?>

<?php
include('inc/header1.php');

 ?>


 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
 <form method="post" action="">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Edit My Profile</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tbody>
                 <tr> 

<th><label>User name</label></th>
    <td><input  style="border: transparent;" type="text" name="username" readonly  value="<?php echo $login_session;?>"></td>
  </tr>
    <tr>
    <th><label>Password</label></th>
    <td><input style="border: transparent;" type="password" name="password" readonly value="<?php echo $login_password; ?>"></td>
  </tr>
    <tr>
    <th><label>Role</label></th>
    <td><input style="border: transparent;" type="text" name="role" required value="<?php echo $login_role;?>"></td>
  </tr>
    <tr>
    <th><label>Phone No</label></th>
    <td><input style="border: transparent;" type="text" name="phone" required value="<?php echo $login_phone; ?>"></td>
  </tr>
    <tr>
    <th><label>Email</label></th>
    <td><input style="border: transparent;" type="email" name="email" required value="<?php echo $login_email; ?>"></td>
  </tr> 
</tbody>
</table>
<center>
<input style="width: 200px;" type="submit" name="update" value="Update">
</center>

</div>
</div>
</div>
</form>




</div>
  <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
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