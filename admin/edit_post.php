
<?php 

include_once("connect.php");
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  if(isset($_POST['update']))
  {
 $username = $_POST['username'];
    $title=$_POST['title'];
    $content=$_POST['content'];  
    $datepost = $_POST['datepost'];
    $category=$_POST['category'];
    $status=$_POST['status'];    
$sql= "UPDATE post SET title='$title',content='$content',datepost='$datepost', status='$status' WHERE id='$id'";
$result=mysql_query($sql);
  if($result)
  {
  echo "Successfully Updated!!";
  header('Location:blogedit.php');
  }
}
} 




include('inc/head.php');
?>

<?php
include('inc/header1.php');

include("session.php");
  if(isset($_GET['id']))
  {
$id=$_GET['id'];
$sql= "SELECT * FROM post WHERE id='$id'";
$result=mysql_query($sql);
$res = mysql_fetch_assoc($result);
if($res)
{
     $username = $res['username'];
    $title = $res['title'];
    $content = $res['content'];
    $status = $res['status'];
    $category = $res['category'];
    // $datepost = $res['datepost'];

     $image = $res['image'];
     $datepost = $res['datepost'];
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


      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Edit User Data</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tbody>
                
<form action="" method="POST">
                  <tr>  
                  <th>Image</th>
                   <td> <img src="./uploads/<?php echo $image;?>" width="80px">  </td>
                 </tr>
                 <tr>
                  <th>Title</th>
                  <td><input style="border:transparent;"  type="text" name="title" value="<?php echo $title;?>"></td>
                </tr>
                <tr>
                  <th>Author Name</th>
                  <td><input style="border:transparent;" type="text" name="username" value="<?php echo $username;?>"></td>
                </tr>
                <tr>
                  <th>Date Post</th>
                   <td><input style="border:transparent;" type="date" name="datepost" value="<?php echo $datepost;?>"></td>
                 </tr>
                 <tr>
                  <th>Category</th>
                   <td><input style="border:transparent;" type="text" name="category" value="<?php echo $category;?>"></td>
                 </tr>
                 <tr>
                  <th>Content</th>
                   <td><textarea style="border:transparent;" name="content" id="editor1" ><?php echo $content;?></textarea></td> 
                   </tr>
                   <tr> 
                  <th>Status</th>
                   <!-- <td><input style="border:transparent;" type="text" name="status" value="<?php echo $status;?>"></td> -->
                   <td>
                      <select name="status" maxlength="50" onchange='checkvalue(this.value)'> 
                      <option hidden disabled selected><?php echo $status;?></option>
                      <option value="publish">Publish</option> 
                    <option value="unpublish">UnPublish</option> 
                    <option value="pending">Pending</option> 
                     </select> 
                   </td> 
                  </tr>
<center>
<tr>
  <td><input style="width: 200px;" type="submit" name="update" value="Update"></td>
</tr>
</center>
</form>
</tbody>
</table>

    <?php } } ?>
    </div>
 
</div>
</div>
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
    <script src="js/ckeditor/ckeditor.js"></script>
      <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
  </div>

   
  </div>
</body>

</html>
