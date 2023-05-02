<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <?php
include("session.php");
if($login_role=='author'){
 header('location:author.php');
}

?>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form action="register1.php" method="post" enctype="multipart/form-data" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Name</label>
                <input class="form-control" id="exampleInputName" name="username" type="text" aria-describedby="nameHelp" placeholder="Enter name">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Phone</label>
                <input class="form-control" id="exampleInputLastName" name="phone" type="text" aria-describedby="nameHelp" placeholder="Enter phone no">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="role">Role</label>
                <!-- <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password"> -->
                <br>
               <select id="role" name="role" maxlength="50" onchange='checkvalue(this.value)' required>
            <option hidden disabled selected>Select User Role</option>
            <optgroup label="User Privilege">
                <option value="admin">Admin</option>
                <option value="author">Author</option>
            </optgroup>
          </select> 
              </div>
            </div>
          </div>
           <div class="form-group">
            <label for="exampleInputImage">Profile Image</label>
            <input class="form-control" id="exampleInputImage" type="file" name="image" id="fileToUpload" required> 
          </div>
         <input class="btn btn-primary btn-block" type="submit" name="submit" value="Register"/>
          <span>
            <?php
              if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                session_destroy();
              }
          ?>
        </span>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
