

 <?php
include('session.php');
 include('connect.php');
        if($_SESSION['role']=='admin'){
if (isset($_POST['submit'])) {
	# code...
	$title = $_POST['title'];
	$status = $_POST['status'];
	$sql = "INSERT INTO status VALUES (id, '$title', '$status')";
	$result =mysql_query($sql);
	if ($result) {
		echo "successfully";
		# code...
	}
	else{	
	}
	$sql = "UPDATE post set status = '$status' where title='$title' ";
	$result=mysql_query($sql);
  if($result)
  {
  echo "Successfully Updated!!";
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
        <li class="breadcrumb-item active">Post</li>
      </ol>
        



<form action="" method="POST">
	  <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Post Status</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tbody>
                 <tr>  
                 	<th>
	<label>Post Title</label>
</th>
<td>

					<select  name="title" maxlength="50" onchange='checkvalue(this.value)'>
                 		<?php
                 	$sql = "SELECT title from post";
                 	$result = mysql_query($sql);
                 	while ($row= mysql_fetch_array($result)) {
                 		# code...
                 	?>
                 	<option hidden disabled selected>Select Blog Title</option>
                 		<option value = "<?php echo $row['title']; ?>" ><?php echo $row['title'];?></option>
                 	<?php
                 	}
                 	?>
                 	</select>
</td>

</tr>
<tr>
	<th>
	<label>Status</label></th>
	<td>
	  <select name="status" maxlength="50" onchange='checkvalue(this.value)'> 
                      <option hidden disabled selected>Select Status</option>
                      <option value="publish">Publish</option> 
                    <option value="unpublish">UnPublish</option> 
                    <option value="pending">Pending</option> 
                     </select> </td>
                 </tr>
             </tbody>
         </table>

     </div>
     <center>
      <input type="submit" name="submit" value="Change Status">
      </center>
 </div>
  
</div>


</form>


<?php

}

?>


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