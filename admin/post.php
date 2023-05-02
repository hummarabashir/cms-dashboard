
<?php 
include('connect.php');
if (isset($_POST['add'])) {
	# code...
	$username = $_POST['username']; 
	$title = $_POST['title'];
	$category =$_POST['category'];
  $status = $_POST['status'];
	$content = $_POST['content'];

$file_name = $_FILES['image']['name'];
    $folder = __DIR__."/uploads/" .$file_name;
   $file_tmp = $_FILES['image']['tmp_name'];
    //$image=$_FILES["file"]["name"];
    if( move_uploaded_file($file_tmp, $folder)) {
      //echo "Successfully uploaded and ";         
    } else {
      // echo "Not uploaded" .$_FILES["file"]["error"];;
    }
    $file = $_FILES['image']['name'];
    $image_name = addslashes($_FILES['image']['name']);


	$sql = "INSERT INTO post Values(id, '$username', '$title', '$category', '$image_name', '$content', now(), '$status')";
	$result= mysql_query($sql);
	if ($result) {
      echo " posted successfully ";
		# code...
	}
	else{
echo "error";
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


<form method="post" action="" enctype="multipart/form-data">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Create Post</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tbody>
                 <tr>
                 	<th><label>Author Name</label></th>
                 	<td><input  style="border: transparent;" type="text" name="username" readonly  value="<?php echo $login_session;?>"></td>
                 </tr>
                  <tr>
                 	<th><label>Title</label></th>
                 	<td><input  type="text" name="title"></td>
                 </tr>
                 <tr>
                 	<th><label>Category</label></th>
                 	<td>
                 	<select id="category" name="category" maxlength="50" onchange='checkvalue(this.value)'>
                 		<?php
                 	$sql = "SELECT name from categories";
                 	$result = mysql_query($sql);
                 	while ($row= mysql_fetch_array($result)) {
                 		# code...
                 	?>
                 	<option hidden disabled selected>Select Category</option>
                 		<option value = "<?php echo $row['name']; ?>" ><?php echo $row['name'];?></option>
                 	<?php
                 	}
                 	?>
                 	</select>
                 </td>
                 </tr>
                 <tr>
                 	<th><label>Image</label></th>
                 	<td><input type="file" name="image"></td>
                 </tr>




               <tr>
                  <th><label>Status</label></th> 
                 <td>
                  <select name="status" maxlength="50" onchange='checkvalue(this.value)'> 
                     <!--  <option hidden disabled selected>Select Status</option>
                      <option value="publish">Publish</option> 
                    <option value="unpublish">UnPublish</option>  -->
                    <option value="pending">Pending</option> 
                     </select> 
                   </td> 
                  </tr> 



                 <tr>
                 <th><label>Content</label></th>
              <!--    <td><input type="text" name="content" ></td> -->
              <td>
              <textarea name="content" id="editor1"></textarea></td>
             </tr>
            <!--  <tr>
             	<th><label>Date Posted</label></th>
             	<td><input type="date" name="datepost"></td>
             </tr> -->
             </tbody>
             </table>
         </div>
                  <center>
<input style="width: 200px;" type="submit" name="add" value="Create Post">
<input  style="width: 200px;" type="reset" name="Reset" value="Cancel" >
</center>
     </div>
 </div>
</form>





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
    <script src="js/ckeditor/ckeditor.js"></script>
      <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
  </div>
</body>

</html>