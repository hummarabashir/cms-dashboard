<?php
include('connect.php');
if (isset($_POST['submit'])) {
  # code...
$name = $_POST['name'];
$comment = $_POST['comment'];
$sql = "INSERT INTO comments Values(id, '$name', '$comment', now())";
$result = mysql_query($sql);
if ($result) {
  # code...
  echo "Comment Posted Successfully";
}
else{
  echo "Error";
}
}
?>
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
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Comments</div>
      <div class="card-body">

        <form method="POST" action="">
          <div class="form-group">
            <label for="exampleInputname">Your Name</label>
            <input class="form-control" id="exampleInputname" name="name" type="text" aria-describedby="userHelp" placeholder="Your Name">
          </div>
          <div class="form-group">
            <label for="exampleComment">Comment</label>
            <input class="form-control" id="exampleComment" name="comment"  type="text" placeholder="Comments ... ">
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="submit" value="Post a Comment"/>
        </form>
     
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