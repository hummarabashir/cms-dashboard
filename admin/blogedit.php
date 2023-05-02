<?php
include('connect.php');
include('session.php');


//   if(isset($_POST['edit']))
//   {
//  $username = $_POST['username'];
//     $id=$_POST['id'];
//     $title=$_POST['title'];
//     $content=$_POST['content'];  
//     $datepost = $_POST['datepost'];
//     $category = $_POST['category'];
//     $status = $_POST['status'];  
// $sql= "UPDATE post SET title='$title',content='$content',datepost='$datepost', status='$status' WHERE id='$id'";
// $result=mysql_query($sql);
//   if($result)
//   {
//   echo "Successfully Updated!!";
//   }
//   else {
//     echo "error";
//   }
// }
if (isset($_POST['delete'])) {
  # code...
  $id = $_POST['id'];
  $sql = "DELETE  from post where id = '$id' ";
  $result = mysql_query($sql);
  if($result){
    echo "deleted Successfully";
  }
}





include('inc/head.php');

// $sql="SELECT * FROM status";
// $result=mysql_query($sql);
// $userinfo=mysql_fetch_assoc($result);
//  $status=$userinfo['status'];
// $_SESSION['status']=$status;
// if ($status == 'publish') {
//   # code...



?>
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
        <li class="breadcrumb-item active">Edit Blog Post</li>
      </ol>
       


    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Edit Blog Post</div>
        <div class="card-body">
                    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tbody>
                 <tr>  
                  <th>Image</th>
                  <th>Title</th>
                  <th>Author Name</th>
                  <th>Date Post</th>
                  <th>Category</th>
                  <th>Content</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                                  
    <?php
$sql="SELECT  * FROM post ";
$result= mysql_query($sql);
while ($row= mysql_fetch_array($result)) { 
if ($row) {
  # code...
  ?>
     <form action="" method="POST">
          <tr>
            <td><input type="text" hidden name="id" value="<?php echo $row['id'];?>"></td>
          </tr>
                <tr>
                 <td> <img src="./uploads/<?php echo $row['image'];?>" width="80px">  </td>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo $row['username'];?></td>
                  <td><?php echo $row['datepost'];?></td>
                  <td><?php echo $row['category'];?></td>



<!--      
                  <td> <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button></td>
                   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
<textarea style="border:transparent; " name="content" id="editor1" ><?php echo $row['content']; ?></textarea>
    </div>
  </div>  -->

<!--  <td>
  <button style="width: 130px;background: none;border: none;color: black;"  type="button" class="btn btn-sm"  data-toggle="modal" data-target="#myModal<?php $row['id'] ?>">
    content
  </button>
<div id="myModal<?= $row['id'] ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body" >
        <textarea id="editor<?php echo $row['id'] ?>" name="content" ><?php echo $row['content']; ?></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</td> 
<script>
      CKEDITOR.replace( 'editor<?php echo $row['id'] ?>' );
            </script> -->

               <!--  // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration. -->
            
                <td><textarea style="border:transparent; width: 130px;" name="content"  ><?php echo $row['content']; ?></textarea></td>  
                    <!-- <td><input style="border:transparent; width: 80px;" type="text" name="content" value="<?php echo $row['content']; ?>"></td>     -->
                <td style="width: 20px;"><?php echo $row['status'];?></td> 

<?php 
if ($_SESSION['role']== 'admin') {
  # code...
  ?>

                 <td> <a href="edit_post.php?id=<?php echo $row['id'] ?>">Edit</a><input  type="submit" name="delete" value="Del" onclick="alert('are you sure!!')"></td>
<?php
}?>
</tr>
</form>

<?php } }?>

</tbody>
</table>
</div>
</div>
</div>


</div>
<?php

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

 
 
  </div>
</body>

</html>