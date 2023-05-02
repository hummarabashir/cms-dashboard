
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Home</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <?php
session_start();
// if(isset($_SESSION['login_user'])){
//  if($_SESSION['role']=='admin'){
//  header('location:index.php');
//  }
//  if($_SESSION['role']=='author'){
//   header('location:user.php');
//  }
// } 
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">

        <form method="POST" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="exampleInputEmail1" name="username" type="text" aria-describedby="userHelp" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="password"  type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="submit" value="Log in"/>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
        </div>
      </div>
    </div>
  </div>

<?php
include("connect.php");
if(isset($_POST['submit'])){
 $username=$_POST['username'];
 $password=$_POST['password'];
 $sql="SELECT*FROM login WHERE username='$username' AND password='$password'";
 $result=mysql_query($sql);
 $row=mysql_num_rows($result);
 $userinfo=mysql_fetch_assoc($result);
 $role=$userinfo['role'];
 if($row==1){
  $_SESSION['login_user']=$username;
  $_SESSION['role']=$role;
  if($role=='admin'){  
  header('location:index.php');
  }
  if($role=='author'){ 
  header('location:index.php');
  }  
 }else{
  echo "No User Found ... ";
 }
} 
?>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
