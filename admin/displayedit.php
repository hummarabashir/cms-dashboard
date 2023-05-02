<?php
include('connect.php');
include('inc/head.php');
?>

<?php 


if(isset($_GET['pid']))
{
  $pid=$_GET['pid'];
}

 if(isset($_POST['update']))
  {
 // $username = $_POST['username'];
    $pname=$_POST['pname'];
    $price = $_POST['price'];
    $category=$_POST['category'];
    $status=$_POST['status'];  
    $pdate = $_POST['pdate'];
    $description = $_POST['description'];

$sql= "UPDATE product SET pname='$pname', price='$price',category='$category', status='$status', pdate='$pdate', description= '$description'  WHERE pid='$pid'";
$result=mysql_query($sql);
  if($result)
  {
  echo "Successfully Updated!!";
  header('Location:display.php');
  }
  else {
    echo "error";
  }
}



include('inc/header1.php');
 ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">View Product</li>
      </ol>


     
	<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Our Products</div>
        <div class="card-body">
          <form action="" method="POST">
                    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tbody>
<?php
  if(isset($_GET['pid']))
  {
$pid=$_GET['pid'];
$sql= "SELECT * FROM product WHERE pid='$pid'";
$result=mysql_query($sql);
$res = mysql_fetch_assoc($result);
$username = $res['username'];
$pname = $res['pname'];
$price = $res['price'];
$category = $res['category'];
$pdate = $res['pdate'];
$status = $res['status'];
$description = $res['description'];
?>

  <tr>
    <th>Product Name</th>
    <td><input type="text" name="pname" value="<?php echo $pname;?>"></td>
  </tr>
  <tr>
    <th>Category</th>
    <td><input type="text" name="category" value="<?php echo $category;?>"></td>
  </tr>
  <tr>
    <th>Price</th>
    <td><input type="text" name="price" value="<?php echo $price;?>"></td>
  </tr>
  <tr>
    <th>Status</th>
    <td><input type="text" name="status" value="<?php echo $status;?>"></td>
  </tr>
  <tr>
    <th>Product Date</th>
    <td><input type="date" name="pdate" value="<?php echo $pdate;?>"></td>
  </tr>
  <tr>
    <th>Description</th>
    <td><input type="text" name="description" value="<?php echo $description;?>"></td>
  </tr>
  <tr>
    <th>Images</th>
    <td>
         <?php
$sql = "SELECT * FROM photo WHERE pid = '$pid' ";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) { ?>
 <img src="./uploads/<?php echo $row['image'];?>" width="50px">
<?php }
    ?>

    </td>
  </tr>
</tbody>
</table>
<?php
}
?>
</div>
<center>
<input  type="submit" name="update" value="update">
</center>
</form>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>