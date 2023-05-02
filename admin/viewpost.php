<?php
include('connect.php');
include('inc/head.php');

// $sql="SELECT * FROM status";
// $result=mysql_query($sql);
// $userinfo=mysql_fetch_assoc($result);
//  $status=$userinfo['status'];
// $_SESSION['status']=$status;
// if ($status == 'publish') {
//   # code...



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
        <li class="breadcrumb-item active">View Post</li>
      </ol>
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Blogs</div>
        <div class="card-body">
<center>
<?php
$sql="SELECT * FROM post where status = 'publish' ";
$result= mysql_query($sql);
while ($row= mysql_fetch_array($result)) { 
if ($row) {
  # code...
  ?>

<hr><hr>
<h1><b> <?php echo $row['title'];?> </b></h1>
<p><b> Author Name</b> <?php echo $row['username'];?> </p>
<p><b>Date Posted On</b> <?php echo $row['datepost'];?></p>
<p><img src="./uploads/<?php echo $row['image'];?>" width="150px"> </p>
<p><?php echo $row['content']; ?></p>
<p><b>Category</b> <?php echo $row['category'];?></p><p><b>Status</b> <?php echo $row['status'];?></p>
<p><a href="comment.php">Comment</a></p>
<br>
<br>
<?php } }?>

</center>
</div>
</div>
</div>


<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © CMS Dashboard 2017</small>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>