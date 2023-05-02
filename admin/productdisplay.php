<?php
include('connect.php');
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
        <li class="breadcrumb-item active">View Product</li>
      </ol>


     
	<div class="col-sm-10">
					<div class="blog-post-area">
						<h2 class="title text-center">Our Products</h2>

<table>
  <tr>
    <th></th>
    <th>Product name</th>
    <th>Category</th>
    <th>Product Image</th>
  </tr>
  <form action="" method="POST">
  <?php
include('connect.php');

$sql = "SELECT * FROM product";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
$id = $row['pid'];
//echo $id;
?>
<tr>
  <td><input type="text"  name="id" value="<?php echo $row['pid']  ?>"></td>
  <td><?php echo $row['pname']  ?></td>
  <td><?php echo $row['category']  ?></td>
  <td>
    <?php
$sql = "SELECT * FROM photo WHERE pid = $id ";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) { ?>
 <img src="./uploads/<?php echo $row['image'];?>" width="50px">
<?php }
    ?>
  </td>
</tr>
<?php
}

?>

</table>


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