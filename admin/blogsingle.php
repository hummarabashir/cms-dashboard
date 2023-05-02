
<?php

include('connect.php');


if (isset($_POST['comment'])) {
  # code...
    $c_name = $_POST['c_name'];
    		$c_content=$_POST['c_content'];
    		$id=$_POST['id'];
$sql = "INSERT INTO comment Values(c_id, '$c_name','$c_content',now(),'$id')";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog | Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

 

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">


</head>
<body>
<div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							

			<?php
 include("connect.php");
$sql= "SELECT* FROM categories";
$result=mysql_query($sql);
?>
<?php
    while($res = mysql_fetch_assoc($result)) {        
   
    ?>
							<div class="panel panel-default">
								<div class="panel-heading">
	
									<h4 class="panel-title"><a href="#"><?php echo $res['name'];   ?></a></h4>
									
								</div>
							</div>
							<?php
										}

									?>
						</div>



					</div>
				</div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						
							<?php

  if(isset($_GET['id']))
  {
  $id=$_GET['id'];

$sql="SELECT * FROM post WHERE id = '$id' ";
$result= mysql_query($sql);
while ($row= mysql_fetch_array($result)) { ?>
									<div class="single-blog-post">
							<h3><?php echo $row['title'];?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> <?php echo $row['username'];?> </li>
									<li><i class="fa fa-tags"></i> <?php echo $row['category'];?> </li>
									<li><i class="fa fa-calendar"></i> <?php echo $row['datepost'];?></li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="./uploads/<?php echo $row['image'];?>" width="600px">
							</a>
							<p><?php echo $row['content']; ?> </p>

<?php } }?>

</div>
					<!--Comments-->


    		<?php 
    	$comment_query=mysql_query("select * from comment where id='$id'")or die(mysql_error());
    	$count=mysql_num_rows($comment_query);
    	?>


					<div class="response-area">
						<h2><?php echo $count; ?> RESPONSES</h2>

						<?php 
						$comment=mysql_query("select * from comment where id='$id'")or die(mysql_error());
    	while($comment_row=mysql_fetch_array($comment))
    		{ ?>
       
						<ul class="media-list">
							<li class="media">
								
								<a class="pull-left" href="#">
									<!-- <img class="media-object" src="./uploads/5.jpg" alt=""> -->
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i><?php echo $comment_row['c_name']; ?></li>
										<!-- <li><i class="fa fa-clock-o"></i> 1:33 pm</li> -->
										<li><i class="fa fa-calendar"></i> <?php echo $comment_row['c_date']; ?></li>
									</ul>
									<p><?php echo $comment_row['c_content']; ?></p>
									<!-- <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Reply</a> -->
								</div>
							</li>
						</ul>	

<?php } ?>
					</div><!--/Response-area-->
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-8">
								<h2>Leave a reply</h2>
								<form method="POST" action="">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<input type="text" name="c_name" placeholder="write your name...">
							
								<div class="text-area">
									<div class="blank-arrow">
									<label>Your Comment</label>
								</div>
									<span>*</span>
									<textarea name="c_content" rows="11" placeholder="your comment"></textarea>
									<button name="comment" type="submit" class="btn btn-primary">post comment</button>
								
								</div>
								</form>
							</div>
						</div>
					</div><!--/Reply Box-->
				</div>	
			</div>
		</div>
	</div>
	</section>
	 <?php



?>



<!-- 
    		// if(isset($_POST['comment'])){
      //           $c_name = $_POST['c_name'];
    		// $c_content=$_POST['c_content'];
    		// $id=$_POST['id'];
     
    	// mysql_query("insert into comment (c_id, c_name,c_content,c_date,id) values(c_id, '$c_name','$c_content',now(),'$id')")or die(mysql_error());
    		 //header('location:blogsingle.php');
    
     
    		// }
    		 -->
	




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