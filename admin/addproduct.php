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
        <li class="breadcrumb-item active">Add Product</li>
      </ol>

<!--  <form action="upload.php" method="post" enctype="multipart/form-data">
       Select files:
          <input type="file" name="upload_file" multiple="multiple">
            <input type="submit" value="Upload file">
   </form>
 -->


  <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
  <input type="submit" value="Upload!" />
</form> -->





<?php
if(isset($_FILES['files'])){
    $errors= array();
  foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    $file_name = $key.$_FILES['files']['name'][$key];
    $file_size =$_FILES['files']['size'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];
    $file_type=$_FILES['files']['type'][$key];  
        if($file_size > 2097152){
      $errors[]='File size must be less than 2 MB';
        }   

        // $file_name = $file_name.",";
        $query="INSERT into photo  VALUES(photoid,'$file_name'); ";
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);   
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"user_data/".$file_name);
            }else{                 
                $new_dir="user_data/".$file_name.time();
                 rename($file_tmp,$new_dir) ;       
            }
            mysql_query($query);      
        }else{
                print_r($errors);
        }
    }
  if(empty($error)){
    echo "Success";
  }
}



?>


<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="files[]" multiple="" />
  <input type="submit"  />
</form>






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