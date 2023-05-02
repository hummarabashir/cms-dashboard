
<?php 

include_once("connect.php");
if(isset($_GET['username']))
{
  $username=$_GET['username'];
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
  header('Location:tables.php');
  }
}
} 





include('inc/head.php');
?>

<?php
include('inc/header1.php');

include("session.php");
  if(isset($_GET['username']))
  {
  $username=$_GET['username'];
$sql= "SELECT * FROM login WHERE username='$username'";
$result=mysql_query($sql);
$res = mysql_fetch_assoc($result);
if($res)
{
    // $username = $res['username'];
    $password = $res['password'];
    $email = $res['email'];
    $role = $res['role'];
    $phone = $res['phone'];
     // $image = $res['image'];





 ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit User Data</li>
      </ol>
      <!-- Example DataTables Card-->



 <form method="post" action="">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Edit User Data</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tbody>
                 <tr> 
                <td>UserName</td>
                <td><input style="border: transparent;" type="text" name="username" required value="<?php echo $username;?>"></td>
            </tr> 
            <tr> 
                <td>Password</td>
                <td><input style="border: transparent;" type="text" name="password" required value="<?php echo $password;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input style="border: transparent;" type="email" name="email" required value="<?php echo $email;?>"></td>
            </tr>
            <tr> 
                <td>Role</td>
                <td><input style="border: transparent;" type="text" name="role" required value="<?php echo $role;?>"></td>
            </tr>
             <tr> 
                <td>Phone</td>
                <td><input style="border: transparent;" type="text" name="phone" required value="<?php echo $phone;?>"></td>
            </tr>
           <!--   <tr> 
                <td>Image</td>
                <td>
                  <input type="text" name="image" required value="<img src='./uploads/<?php echo $row['image'];?>" width='100px'>
                </td>
            </tr> -->

            <tr>
                <td><input type="hidden" name="username" value=<?php echo $_GET['username'];?>></td>
                <td><input style="width: 200px;" type="submit" name="update" value="Update"></td>
            </tr>
          
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </form>
    <?php } } ?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
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
            <a class="btn btn-primary" href="login.php">Logout</a>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
