<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shopping Cart | Detail</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<section>
		<center>
			<h1 style="color: orange; font-weight: bolder;">PRODUCT DETAIL</h1>
		</center>
		<br>
		<div class="container">

			<div class="row">
				<div class="col-sm-3">
				
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->


<?php
 include("connect.php");
$sql= "SELECT* FROM pcategory";
$result=mysql_query($sql);
?>
<?php
    while($res = mysql_fetch_assoc($result)) {        
   
    ?>
							<div class="panel panel-default">
								<div class="panel-heading">
	
									<h4 class="panel-title"><a href="#"><?php echo $res['cname'];   ?></a></h4>
									
								</div>
							</div>
							<?php
										}

									?>



							
					</div>
				</div>
			</div>
				<?php
  if(isset($_GET['pid']))
  {
$pid=$_GET['pid'];
$sql= "SELECT * FROM product WHERE pid='$pid'";
$result=mysql_query($sql);
$count  =   mysql_num_rows($result);
$res = mysql_fetch_assoc($result);
$username = $res['username'];
$pname = $res['pname'];
$price = $res['price'];
$category = $res['category'];
$pdate = $res['pdate'];
$status = $res['status'];
$description = $res['description'];
$pid = $res['pid'];

?>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">

								<?php
											$query= "SELECT * FROM photo where pid=".$res['pid']." LIMIT 1 ";
											// die();
											$pic_result = mysql_query($query);
											$count = mysql_num_rows($pic_result);
											while($pic_row = mysql_fetch_array($pic_result)) {
												if (!empty($pic_row['image'])) {
													# code...
												
										?>
										
										
										<img src="uploads/<?= $pic_row['image'] ?> " width ="20px">
										
<?php 
											}}
										 ?>

								<!-- <img src="images/product-details/1.jpg" alt="" /> -->
								<!-- <h3>ZOOM</h3> -->
							</div>

<div class="slider">
    <?php
    $query= "SELECT * FROM photo where pid=".$res['pid']." ";
											// die();
											$result = mysql_query($query);
						$count = mysql_num_rows($pic_result);
						while ($res = mysql_fetch_array($result)) {
							# code...
							?>
							<img src="uploads/<?= $res['image'] ?> " width ="50px">
					<?php	}
?>
</div>





							<!-- <div id="similar-product" class="carousel slide" data-ride="carousel"> -->
								
								  <!-- Wrapper for slides -->
								    <!-- <div class="carousel-inner"> -->
										<!-- <div class="item active"> -->
										  <!-- <a href=""><img src="uploads/<?= $pic_row['image'] ?> " width ="100px"></a> -->
										 <!--  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a> -->
										<!-- </div> -->
										
									<!-- </div> -->

								  <!-- Controls -->
						<!-- 		  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div> -->

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
 <form method="POST" action="cart.php?pid=<?php echo $pid; ?>">
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $pname;?></h2>
								<p><b>Product ID:</b> <?php echo $pid;?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>$<?php echo $price;?></span>
									<label>Quantity:</label>
									<input type="text" name="quantity"  value="1" />
									<!-- <button type="button" class="btn btn-fefault cart" name="add_to_cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button> -->
											<input type="hidden" name="hidden_name" value="<?php echo $pname; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $price; ?>" />  
										<input type="submit" style="width: 150px;" name="add_to_cart" class="fa fa-shopping-cart" class="btn btn-default" value="Add to Cart" />
								</span>
								<p><b>Availability:</b> <?php echo $status;?></p>
								<p><b>Description:</b> <?php echo $description;?></p>
								<p><b>Brand:</b> E-SHOPPER</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</form>
							</div><!--/product-information-->
						</div>
							<?php
				}
				?>
					</div><!--/product-details-->
					
					
				</div>
				
			</div>
		</div>

	</section>
	
	 <footer id="footer">

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-Shopper. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer> <!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>


</body>
</html>

